import Header from "./components/Header/Header";

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
        <div className="inner_container">
          <p>Scandiweb Test Assignment</p>
        </div>
      </footer>
    </div>
  );
}

export default App;
