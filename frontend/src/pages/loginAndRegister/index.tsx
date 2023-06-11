import {
  LoginAndRegisterSection,
  LoginAndRegisterWrapper,
  LogoSection,
} from "./styles";
import logo from "../../assets/logo.png";
import { LoginForm } from "../../components/loginForm";
import { RegisterForm } from "../../components/registerForm";
import { useRootContext } from "../../context/RootContext";

export const LoginAndRegister = () => {
  const { hasAccount } = useRootContext();

  return (
    <LoginAndRegisterWrapper>
      <LoginAndRegisterSection>
        {hasAccount ? <LoginForm /> : <RegisterForm />}
      </LoginAndRegisterSection>
      <LogoSection>
        <img src={logo} alt="Uhuu!" />
      </LogoSection>
    </LoginAndRegisterWrapper>
  );
};
