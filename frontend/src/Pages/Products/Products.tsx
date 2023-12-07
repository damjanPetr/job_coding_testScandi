import { useState } from "react";
import { useLoaderData } from "react-router-dom";
import Product from "../../components/Product/Product";
import "./Products.scss";

export async function productsLoader() {
  const response = await fetch(
    import.meta.env.VITE_BACKEND_URL + "ProductApi.php",
    {
      method: "POST",

      body: JSON.stringify({
        action: "GET",
      }),
    }
  );
  const data = await response.json();
  return data;
}

export type Product_Props = {
  id: number;
  sku: number;
  name: string;
  price: string;
  attribute_name: string;
  attribute_value: string;
  attribute_prop: string | null;
};
function Products() {
  const data = useLoaderData() as Product_Props[];

  const [products, setProducts] = useState<Product_Props[]>(data);

  return (
    <div className="products-page">
      <form
        id="all_products_form"
        action=""
        onSubmit={async (e) => {
          e.preventDefault();
          const formdata = new FormData(e.currentTarget);
          const productIds = [...formdata.keys()];
          const response = await fetch(
            import.meta.env.VITE_BACKEND_URL + "ProductApi.php",
            {
              method: "POST",
              body: JSON.stringify({
                products_id_array: productIds,
                action: "DELETE",
              }),
            }
          );
          const data = await response.json();

          if (data) {
            setProducts(
              products.filter(
                (item: Product_Props) =>
                  !productIds.includes(item.id.toString())
              )
            );
          }
        }}
      >
        <div className="products_container">
          {products.length > 0 ? (
            products.map((item) => {
              return <Product data={item} key={item.id} />;
            })
          ) : (
            <p>No products currently in the Database</p>
          )}
        </div>
      </form>
    </div>
  );
}
export default Products;
