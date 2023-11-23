import React from "react";
import ReactDOM from "react-dom/client";
import { createBrowserRouter, RouterProvider } from "react-router-dom";
import App from "./App.tsx";
import "./index.scss";
import AddProductPage from "./Pages/AddProductPage/AddProductPage.tsx";
import Products from "./Pages/Products/Products.tsx";

const router = createBrowserRouter([
  {
    path: "/",
    element: (
      <App heading="Products List" showFormBtns={false}>
        <Products />
      </App>
    ),
  },
  {
    path: "/add-product",
    element: (
      <App heading="Products Add" showFormBtns={true}>
        <AddProductPage />
      </App>
    ),
  },
]);

ReactDOM.createRoot(document.getElementById("root")!).render(
  <React.StrictMode>
    <RouterProvider router={router} />
  </React.StrictMode>
);
