import Product from "./components/Product/Product";
import Header from "./components/Header/Header";
import { useState } from "react";
import AddProductPage from "./AddProductPage";

function App() {
  const array = [];

  const [status, setStatus] = useState<"products" | "add">("products");
  for (let i = 0, len = 10; i < len; i++) {
    array[i] = {
      name: "test" + i,
      sku: "test" + i,
      price: "test" + i,
      data: {
        size: "test" + i,
        weigth: "test" + i,
        dimensions: "test" + i,
      },
    };
  }
  return (
    <div>
      <Header />
      <main>
        {status === "products" &&
          array.map((item) => {
            return (
              <Product
                key={item.sku}
                sku={item.sku}
                name={item.name}
                price={item.price}
                data={{
                  size: item.data.size,
                  weigth: item.data.weigth,
                  dimensions: item.data.dimensions,
                }}
              />
            );
          })}
        {status === "add" && <AddProductPage />}
      </main>
      <footer></footer>
    </div>
  );
}

export default App;
