import { Product_Props } from "../../Pages/Products/Products";
import "./Product.scss";

function Product({
  data: {
    sku,
    name,
    price,
    attribute_name,
    attribute_value,
    attribute_prop,
    id,
  },
}: {
  data: Product_Props;
}) {
  return (
    <div
      className="product"
      onClick={(e) => {
        const checkbox = e.currentTarget.querySelector(
          ".delete-checkbox"
        ) as HTMLInputElement;
        console.log(checkbox);
        checkbox.checked = !checkbox.checked;
      }}
    >
      <input
        type="checkbox"
        className="delete-checkbox"
        name={id + ""}
        value={""}
      />
      <div className="inner_container">
        <p>{sku}</p>
        <p>{name}</p>
        <p>{price + " $"}</p>
        <p>
          {attribute_name + " "}: {attribute_prop} {attribute_value}
        </p>
      </div>
    </div>
  );
}

export default Product;
