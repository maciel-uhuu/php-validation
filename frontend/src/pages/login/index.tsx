import {
  LoginAndRegisterSection,
  LoginAndRegisterWrapper,
  LogoSection,
} from "./styles";
import logo from "../../assets/logo.png";
import { LoginForm } from "../../components/LoginForm";

export const LoginAndRegister = () => {

  return (
    <LoginAndRegisterWrapper>
      <LoginAndRegisterSection>
        <LoginForm />
      </LoginAndRegisterSection>
      <LogoSection>
        <img src={logo} alt="Uhuu!" />
      </LogoSection>
    </LoginAndRegisterWrapper>
  );
};
