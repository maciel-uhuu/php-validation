import { createBrowserRouter } from "react-router-dom";
import { Home } from "../pages/home/index.tsx";
import { LoginAndRegister } from "../pages/login/index.tsx";

export const router = createBrowserRouter([
  {
    path: "/",
    element: <LoginAndRegister />,
  },
  {
    path: "/home",
    element: <Home />,
  }
]);