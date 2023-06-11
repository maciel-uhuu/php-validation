import React from "react";
import ReactDOM from "react-dom/client";
import "./styles/reset.css";
import { ThemeProvider } from "styled-components";
import { theme } from "./styles/theme.ts";
import { RouterProvider } from "react-router-dom";
import { router } from "./routes";

ReactDOM.createRoot(document.getElementById("root") as HTMLElement).render(
  <React.StrictMode>
    <ThemeProvider theme={theme}>
      <RouterProvider router={router} />
    </ThemeProvider>
  </React.StrictMode>
);
