import { useState } from "react";
import { useRootContext } from "../../context/RootContext";
import { LoginWrapper, LoginFormWrapper } from "./styles";
import { api } from "../../config/services/api";

export const LoginForm = () => {
  const { setHasAccount, hasAccount } = useRootContext();

  const [form, setForm] = useState({
    email: "",
    password: "",
  });
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);

  const handleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setForm({
      ...form,
      [event.target.id]: event.target.value,
    });
  };

  const handleLogin = async () => {
    setLoading(true);

    if (!form.email || !form.password) {
      setError("Preencha todos os campos");
      return;
    }

    try {
      const { data } = await api.post("/api/login", form);

      if (data.error) {
        setError(data.message);
      }

      console.log(data);
    } catch (error) {
      console.log(error);
      setError("Erro ao realizar login");
    } finally {
      setLoading(false);
    }
  };

  return (
    <LoginWrapper>
      <div>
        <h1>Uhuu!</h1>
        <span>Por uma vida com mais Uhuu!</span>
      </div>

      <LoginFormWrapper action="">
        <div className="form-input-box">
          <label htmlFor="email">Email</label>
          <input
            type="email"
            id="email"
            value={form.email}
            onChange={handleChange}
            required
          />
        </div>

        <div className="form-input-box">
          <label htmlFor="password">Senha</label>
          <input
            type="password"
            id="password"
            value={form.password}
            onChange={handleChange}
            required
          />
        </div>

        <div className="form-button-box">
          <button type="button" onClick={handleLogin}>
            Entrar
          </button>
          <span>
            Não tem uma conta?{" "}
            <span
              className="form-register-link"
              onClick={() => {
                setHasAccount(!hasAccount);
              }}
            >
              Cadastre-se
            </span>
          </span>
        </div>

        {error && <span className="form-error">{error}</span>}
        {loading && <span className="form-loading">Carregando...</span>}
      </LoginFormWrapper>
    </LoginWrapper>
  );
};
