import { useState } from "react";
import { useRootContext } from "../../context/RootContext";
import { LoginWrapper, LoginFormWrapper } from "./styles";
import { api } from "../../config/services/api";
import { useCookies } from "react-cookie";
import { User } from "../../interfaces";
import { useNavigate } from "react-router-dom";

export const LoginForm = () => {
  const { setHasAccount, hasAccount, setUser } = useRootContext();
  const [cookies, setCookie, removeCookie] = useCookies(["uhuu-token"]);
  const navigate = useNavigate();

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

  const handleLogin = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    setLoading(true);

    if (!form.email || !form.password) {
      setError("Preencha todos os campos");
      return;
    }

    try {
      const { data } = await api.post("/api/login", form);

      setCookie("uhuu-token", data.token);
      setUser(data.user as User);

      navigate("/home");
    } catch (error: any) {
      console.log(error);
      setError(error.response.data.error);
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

      <LoginFormWrapper onSubmit={handleLogin}>
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
          {error && <span style={{ color: "red" }}>{error}</span>}
        </div>

        <div className="form-button-box">
          <button type="submit" disabled={loading}>
            {loading ? "Carregando..." : "Entrar"}
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
      </LoginFormWrapper>
    </LoginWrapper>
  );
};
