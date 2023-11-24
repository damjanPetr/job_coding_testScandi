import { useState } from "react";
import "./AddProductPage.scss";
function AddProductPage() {
  const [type, setType] = useState<"dvd" | "furniture" | "book">("book");

  async function handleSubmit(e: HTMLFormElement) {
    const formData = Object.fromEntries(new FormData(e));

    const response = await fetch(
      "http://localhost:80/job_coding_test/backend/api/ProductApi.php",
      {
        method: "POST",
        body: JSON.stringify({
          productProperties: formData,
          attributes: [],
        }),
      }
    );
    const data = await response.json();
    console.log(data);
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
          </div>
          <div className="inner">
            <label htmlFor="name">Name</label>
            <input type="text" name="name" id="name" />
          </div>
          <div className="inner">
            <label htmlFor="price">Price</label>
            <input type="text" name="price" id="price" />
          </div>
        </div>

        <div className="select-container">
          <label htmlFor="productType">Type Switcher</label>
          <div className="inner">
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
            {/* <svg
              xmlns="http://www.w3.org/2000/svg"
              width="32"
              height="32"
              viewBox="0 0 24 24"
            >
              <path
                fill="currentColor"
                d="M8.12 9.29L12 13.17l3.88-3.88a.996.996 0 1 1 1.41 1.41l-4.59 4.59a.996.996 0 0 1-1.41 0L6.7 10.7a.996.996 0 0 1 0-1.41c.39-.38 1.03-.39 1.42 0z"
              />
            </svg> */}
          </div>
        </div>
        <div className="type-container">
          {type === "book" && (
            <div className="">
              <label htmlFor="weight">Weight</label>
              <input type="text" name="weight" id="weight" />
              <p>Please provide weight in kgs</p>
            </div>
          )}
          {type === "dvd" && (
            <div className="">
              <label htmlFor="size">Size</label>
              <input type="text" name="size" id="size" />
              <p>Please provide media size in MB</p>
            </div>
          )}
          {type === "furniture" && (
            <div className="">
              <div className="">
                <label htmlFor="height">Height</label>
                <input type="text" name="height" id="height" />
              </div>

              <div className="">
                <label htmlFor="width">Width</label>
                <input type="text" name="width" id="width" />
              </div>

              <div className="">
                <label htmlFor="length">Length</label>
                <input type="text" name="" id="length" />
              </div>
              <p>Please provide dimensions in HxWxL format</p>
            </div>
          )}
        </div>
      </form>
    </div>
  );
}
export default AddProductPage;
