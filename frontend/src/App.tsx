import Header from "./components/Header/Header";
import { Outlet } from "react-router-dom";

function App({
  heading,
  children,
  showFormBtns,
}: {
  heading: string;
  children?: React.ReactNode;
  showFormBtns?: boolean;
}) {
  return (
    <div>
      <Header title={heading} showFormBtns={showFormBtns} />
      <main className="">{children}</main>
      <footer>
        <p>Scandiweb Test Assignment</p>
      </footer>
    </div>
  );
}

export default App;
