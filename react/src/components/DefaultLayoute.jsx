import { Outlet, Navigate, Link } from "react-router-dom";
import { useStateContext } from "../contexts/contextProvider";
import axiosClient from "../axiosClient";
import { useEffect } from "react";

const DefaultLayoute = () => {
    const {user, token, setUser, setToken, notification} = useStateContext();
  if (!token) {
    return <Navigate to="/login" />;
  }

  const onLogout = (ev) => {
    ev.preventDefault();

    axiosClient.post("/logout").then(() => {
      setUser({});
      setToken(null);
    });
  };

  useEffect(() => {
    axiosClient.get("/user").then(({ data }) => {
      setUser(data);
    });
  }, []);

  return (
    <div id="defaultLayout">
      <aside>
        <Link to="/dashboard">dahsboard</Link>
        <Link to="/users">users</Link>
      </aside>
      <div className="content">
        <header>
          <div>header</div>
          <div>
            {user.name} &nbsp; &nbsp;
            <a onClick={onLogout} className="btn-logout" href="#">
              Logout
            </a>
          </div>
        </header>
        <main>
          <Outlet />
        </main>
        {notification &&
          <div className="notification">
            {notification}
          </div>
        }
      </div>
    </div>
  );
};

export default DefaultLayoute;
