import "./ErrorMessage.scss";
type Props = {
  error: string;
};

function ErrorMessage({ error }: Props) {
  return (
    <div className="error_message">
      <p className="">{error}</p>
    </div>
  );
}
export default ErrorMessage;
