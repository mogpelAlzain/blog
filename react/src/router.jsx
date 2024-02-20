import { createBrowserRouter, Navigate } from "react-router-dom";
import Login from "./views/login";
import Users from "./views/Users";
import Sinup from "./views/sinup";
import NotFound from "./views/NotFound";
import GuestLayoute from "./components/GuestLayoute";
import DefaultLayoute from "./components/DefaultLayoute";
import Dashboard from "./components/Dashboard";
import UserForm from "./views/UserForm";
const router = createBrowserRouter([
  {
    path: "/",
    element: <DefaultLayoute />,
    children: [
      {
        path: "/",
        element: <Navigate to="/users" />,
      },
      {
        path: "/users",
        element: <Users />,
      },
      {
        path: '/users/new',
        element: <UserForm key="userCreate" />
      },
      {
        path: '/users/:id',
        element: <UserForm key="userUpdate" />
      },
      {
        path: "/dashboard",
        element: <Dashboard />,
      },
    ],
  },
  {
    path: "/",
    element: <GuestLayoute />,
    children: [
      {
        path: "/login",
        element: <Login />,
      },
      {
        path: "/signup",
        element: <Sinup />,
      },
    ],
  },
  {
    path: "*",
    element: <NotFound />,
  },
]);

export default router;
