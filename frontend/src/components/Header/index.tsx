import logo from "../../assets/logo.png";
import { HeaderNav, HeaderUser, HeaderWrapper } from "./styles";
import { useNavigate } from "react-router-dom";
import { useCookies } from "react-cookie";

export const Header = () => {
  const [cookies, setCookie, removeCookie] = useCookies(["uhuu-token"]);
  const navigate = useNavigate();

  const handleLogout = () => {
    removeCookie("uhuu-token");
    navigate("/");
  };

  return (
    <HeaderWrapper>
      <HeaderNav>
        <img src={logo} alt="Uhuu!" />
      </HeaderNav>

      <HeaderUser>
        <span className="logout" onClick={handleLogout}>
          Sair
        </span>
      </HeaderUser>
    </HeaderWrapper>
  );
};
