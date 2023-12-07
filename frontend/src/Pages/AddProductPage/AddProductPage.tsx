import { useState } from "react";
import { useNavigate } from "react-router-dom";
import ErrorMessage from "../../components/ErrorMessage";
import "./AddProductPage.scss";
function AddProductPage() {
  const [type, setType] = useState<"dvd" | "furniture" | "book">("book");

  const nav = useNavigate();
  const [errors, setErrors] = useState<{ [x: string]: string }>({});
  async function handleSubmit(e: HTMLFormElement) {
    const formData = Object.fromEntries(new FormData(e));

    const response = await fetch(
      import.meta.env.VITE_BACKEND_URL + "ProductApi.php",
      {
        method: "POST",
        body: JSON.stringify({
          productProperties: formData,
          action: "POST",
        }),
      }
    );
    const data = await response.json();
    if (data.errors) {
      setErrors(data.errors);
    } else {
      nav("/");
    }
  }
  return (
    <div className="add-product-page">
      <form
        action=""
        id="product_form"
        onSubmit={(e) => {
          handleSubmit(e.currentTarget);
        }}
      >
        <div className="input-container">
          <div className="inner">
            <label htmlFor="sku">SKU</label>
            <input type="text" name="sku" id="sku" />
            {errors.sku && <ErrorMessage error={errors.sku} />}
          </div>

          <div className="inner">
            <label htmlFor="name">Name</label>
            <input type="text" name="name" id="name" />
            {errors.name && <ErrorMessage error={errors.name} />}
          </div>

          <div className="inner">
            <label htmlFor="price">Price ($)</label>
            <input type="text" name="price" id="price" />
            {errors.price && <ErrorMessage error={errors.price} />}
          </div>
        </div>

        <div className="select-container">
          <label htmlFor="productType">Type Switcher</label>
          <div className="">
            <select
              name="type"
              id="productType"
              onChange={(e) => {
                setType(e.currentTarget.value as "book" | "furniture" | "dvd");
              }}
            >
              <option value="book">Book</option>
              <option value="furniture">Furniture</option>
              <option value="dvd">DVD</option>
            </select>
          </div>
        </div>
        <div className="type-container">
          {type === "book" && (
            <div className="">
              <div className="inner">
                <label htmlFor="weight">
                  Weight (<b>KG</b>)
                </label>
                <input type="text" name="weight" id="weight" />
                {errors.weight && <ErrorMessage error={errors.weight} />}
              </div>
              <p>
                Please provide weight in <b>KGs</b>.
              </p>
            </div>
          )}
          {type === "dvd" && (
            <div className="">
              <div className="inner">
                <label htmlFor="size">
                  Size (<b>MB</b>)
                </label>
                <input type="text" name="size" id="size" />
                {errors.size && <ErrorMessage error={errors.size} />}
              </div>
              <p>
                Please provide media size in <b>MB</b>.
              </p>
            </div>
          )}
          {type === "furniture" && (
            <div className="">
              <div className="inner">
                <label htmlFor="height">
                  Height (<b>CM</b>)
                </label>
                <input type="text" name="height" id="height" />
                {errors.height && <ErrorMessage error={errors.height} />}
              </div>

              <div className="inner">
                <label htmlFor="width">
                  Width (<b>CM</b>)
                </label>
                <input type="text" name="width" id="width" />
                {errors.width && <ErrorMessage error={errors.width} />}
              </div>

              <div className="inner">
                <label htmlFor="length">
                  Length (<b>CM</b>)
                </label>
                <input type="text" name="length" id="length" />
                {errors.length && <ErrorMessage error={errors?.length} />}
              </div>
              <p>
                Please provide dimensions in <b>HxWxL</b> format.
              </p>
            </div>
          )}
        </div>
      </form>
    </div>
  );
}
export default AddProductPage;
