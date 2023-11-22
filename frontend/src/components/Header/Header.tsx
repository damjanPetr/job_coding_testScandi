import "./Header.scss";

function Header() {
  return (
    <div className="header">
      <div className="inner_container">
        <div className="">
          <h1>Product List</h1>
        </div>
        {/* Buttons */}
        <div className="buttons">
          <button className="addBtn">Add</button>
          <button id="delete-product-btn" className="massDelBtn">
            Mass Delete
          </button>
        </div>
      </div>
    </div>
  );
}

export default Header;
