import { createContext, ReactNode, useContext, useState } from "react";
import { User } from "../interfaces";


interface RootContextProviderProps {
  children: ReactNode;
}

interface RootContext {
  hasAccount: boolean;
  setHasAccount: (value: boolean) => void;
  user: User;
  setUser: (value: User) => void;
}

export const RootContext = createContext({} as RootContext);

export const RootContextProvider = ({ children }: RootContextProviderProps) => {
  const [hasAccount, setHasAccount] = useState(true);
  const [user, setUser] = useState<User>({} as User);

  return (
    <RootContext.Provider value={{ hasAccount, setHasAccount, user, setUser }}>
      {children}
    </RootContext.Provider>
  );
}

export const useRootContext = () => useContext(RootContext);