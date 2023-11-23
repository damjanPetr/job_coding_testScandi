import "./Product.scss";

type Props = {
  sku: string;
  name: string;
  price: string;
  data: {
    size: string;
    weight: string;
    dimensions: string;
  };
};

function Product({ sku, name, price, data }: Props) {
  return (
    <form className="product">
      <input type="checkbox" id="delete-checkbox" />
      <div className="inner_container">
        <h3>{name}</h3>
        <p>{sku}</p>
        <p>{price}</p>
        <p>{data.size}</p>
        <p>{data.weight}</p>
        <p>{data.dimensions}</p>
      </div>
    </form>
  );
}

export default Product;
