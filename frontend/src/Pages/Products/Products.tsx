import Product from "../../components/Product/Product";
import "./Products.scss";

function Products() {
  const array = [];
  for (let i = 0, len = 10; i < len; i++) {
    array[i] = {
      name: "test" + i,
      sku: "test" + i,
      price: "test" + i,
      data: {
        size: "test" + i,
        weight: "test" + i,
        dimensions: "test" + i,
      },
    };
  }

  return (
    <div className="products-page">
      <div className="products_container">
        {array.map((item) => {
          return (
            <Product
              key={item.sku}
              sku={item.sku}
              name={item.name}
              price={item.price}
              data={{
                size: item.data.size,
                weight: item.data.weight,
                dimensions: item.data.dimensions,
              }}
            />
          );
        })}
      </div>
    </div>
  );
}
export default Products;
