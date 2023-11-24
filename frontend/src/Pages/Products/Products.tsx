import { useLoaderData } from "react-router-dom";
import Product from "../../components/Product/Product";
import "./Products.scss";
import { useEffect, useState } from "react";
export async function productsLoader() {
  const response = await fetch(
    "http://localhost:80/job_coding_test/backend/api/ProductApi.php",
    {
      method: "GET",
    }
  );
  const data = await response.json();
  console.log(data);
}

function Products() {
  type Product = {
    sku: string;
    name: string;
    price: string;
    data: {
      size: string;
      weight: string;
      dimensions: string;
    };
  };

  const data = useLoaderData() as { products: Product[] };
  // const [products, setProducts] = useState<Product[]>();

  return (
    <div className="products-page">
      <div className="products_container">
        {data.products ? (
          data.products.map((item) => {
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
          })
        ) : (
          <p>No Products in the Database</p>
        )}
      </div>
    </div>
  );
}
export default Products;
