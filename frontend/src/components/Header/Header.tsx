import { Link } from "react-router-dom";
import "./Header.scss";

function Header({
  title,
  showFormBtns,
}: {
  title: string;
  showFormBtns?: boolean;
}) {
  return (
    <div className="header">
      <div className="inner_container">
        <div className="">
          <h1>{title}</h1>
        </div>
        {/* Buttons */}
        <div className="buttons">
          {!showFormBtns && (
            <>
              <Link to={"/add-product"} id="add-product-btn">
                ADD
              </Link>
              <button
                id="delete-product-btn"
                className="massDelBtn"
                onClick={() => {
                  const form = document.querySelector("#all_products_form");
                  form?.dispatchEvent(new Event("submit", { bubbles: true }));
                }}
              >
                MASS DELETE
              </button>
            </>
          )}
          {showFormBtns && (
            <>
              <button
                onClick={() => {
                  const form = document.querySelector("#product_form");
                  form?.dispatchEvent(new Event("submit", { bubbles: true }));
                }}
              >
                Save
              </button>
              <Link to={"/"}>Cancel</Link>
            </>
          )}
        </div>
      </div>
    </div>
  );
}

export default Header;
