import { createContext, ReactNode, useContext, useState } from "react";


interface RootContextProviderProps {
  children: ReactNode;
}

interface RootContext {
  hasAccount: boolean;
  setHasAccount: (value: boolean) => void;
}

export const RootContext = createContext({} as RootContext);

export const RootContextProvider = ({ children }: RootContextProviderProps) => {
  const [hasAccount, setHasAccount] = useState(true);

  return (
    <RootContext.Provider value={{ hasAccount, setHasAccount }}>
      {children}
    </RootContext.Provider>
  );
}

export const useRootContext = () => useContext(RootContext);