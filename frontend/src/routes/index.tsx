import { createBrowserRouter } from "react-router-dom";
import { Home } from "../pages/home/index.tsx";

export const router = createBrowserRouter([
  {
    path: "/",
    element: <Home />,
  },
]);