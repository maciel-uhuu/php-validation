import { useRootContext } from "../../context/RootContext";
import { RegisterWrapper, RegisterFormWrapper } from "./styles";



export const RegisterForm = () => {
  const { setHasAccount, hasAccount } = useRootContext();

  return (
    <RegisterWrapper>
      <div>
        <h1>Uhuu! - Cadastre-se</h1>
        <span>Por uma vida com mais Uhuu!</span>
      </div>

      <RegisterFormWrapper action="">
        <div className="form-double-inputs-box">
          <div className="form-input-box">
            <label htmlFor="name">Nome</label>
            <input type="text" id="name" />
          </div>

          <div className="form-input-box">
            <label htmlFor="email">Email</label>
            <input type="text" id="email" />
          </div>
        </div>

        <div className="form-double-inputs-box">
          <div className="form-input-box">
            <label htmlFor="document">CPF</label>
            <input type="text" id="document" />
          </div>

          <div className="form-input-box">
            <label htmlFor="address">Endereço</label>
            <input type="text" id="address" />
          </div>
        </div>

        <div className="form-double-inputs-box">
          <div className="form-input-box">
            <label htmlFor="phone">Celular</label>
            <input type="text" id="phone" />
          </div>

          <div className="form-input-box">
            <label htmlFor="password">Senha</label>
            <input type="password" id="password" />
          </div>
        </div>

        <div className="form-button-box">
          <button type="button">Cadastrar</button>
          <span>
            Já tem uma conta?{" "}
            <span className="form-register-link" onClick={() => {
              setHasAccount(!hasAccount);
            }}>Entre</span>
          </span>
        </div>
      </RegisterFormWrapper>
    </RegisterWrapper>
  );
};
