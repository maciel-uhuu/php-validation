import {
  createContext,
  ReactNode,
  useContext,
  useEffect,
  useState,
} from "react";
import { User } from "../interfaces";
import { api } from "../config/services/api";
import { useCookies } from "react-cookie";

interface RootContextProviderProps {
  children: ReactNode;
}

interface RootContext {
  hasAccount: boolean;
  setHasAccount: (value: boolean) => void;
  user: User;
  setUser: (value: User) => void;
  getClients: (page?: number, limit?: number) => void;
  data: any;
  setData: any;
  error: string;
  setError: (value: string) => void;
}

export const RootContext = createContext({} as RootContext);

export const RootContextProvider = ({ children }: RootContextProviderProps) => {
  const [hasAccount, setHasAccount] = useState(true);
  const [user, setUser] = useState<User>({} as User);
  const [data, setData] = useState([]);
  const [cookies, setCookie, removeCookie] = useCookies(["uhuu-token"]);
  const [cookiesUser, setCookieUser, removeCookieUser] = useCookies([
    "uhuu-userId",
  ]);

  const [error, setError] = useState("");

  const getClients = async (page = 1, limit = 10) => {
    try {
      const { data } = await api.get("/api/clients", {
        headers: {
          Authorization: `Bearer ${cookies["uhuu-token"]}`,
        },
        params: {
          page,
          limit,
        },
      });

      setData(data);
    } catch (error) {
      console.log(error);
    }
  };

  const getUser = async () => {
    if (cookies["uhuu-token"]) {
      try {
        const { data } = await api.get(`api/users/${cookiesUser["uhuu-userId"]}`, {
          headers: {
            Authorization: `Bearer ${cookies["uhuu-token"]}`,
          },
        });
  
        setUser(data);
      } catch (error) {
        console.log(error);
      }
    } else {
      window.location.href = "/";
    }
  };

  useEffect(() => {
    getUser();
  }, []);

  useEffect(() => {
    if (error) {
      setTimeout(() => {
        setError("");
      }, 3000);
    }
  }, [error]);

  return (
    <RootContext.Provider
      value={{
        hasAccount,
        setHasAccount,
        user,
        setUser,
        getClients,
        data,
        setData,
        error,
        setError,
      }}
    >
      {children}
    </RootContext.Provider>
  );
};

export const useRootContext = () => useContext(RootContext);
