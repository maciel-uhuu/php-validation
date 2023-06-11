import React from "react";
import ReactDOM from "react-dom/client";
import "./styles/reset.css";
import { ThemeProvider } from "styled-components";
import { theme } from "./styles/theme.ts";
import { RouterProvider } from "react-router-dom";
import { router } from "./routes";
import { RootContextProvider } from "./context/RootContext.tsx";

ReactDOM.createRoot(document.getElementById("root") as HTMLElement).render(
  <React.StrictMode>
    <RootContextProvider>
      <ThemeProvider theme={theme}>
        <RouterProvider router={router} />
      </ThemeProvider>
    </RootContextProvider>
  </React.StrictMode>
);
