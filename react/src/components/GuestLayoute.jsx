import { Outlet, Navigate } from "react-router-dom";
import { useStateContext } from "../contexts/contextProvider";
const GuestLayoute = () => {
  const { token } = useStateContext();

  if (token) {
    return <Navigate to="/" />;
  }
  return (
    <div id="guestLayout">
      <Outlet />
    </div>
  );
};

export default GuestLayoute;
