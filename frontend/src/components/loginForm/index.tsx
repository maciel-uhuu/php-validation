import { useState } from "react";
import { useRootContext } from "../../context/RootContext";
import { LoginWrapper, LoginFormWrapper } from "./styles";
import { api } from "../../config/services/api";
import { useCookies } from "react-cookie";
import { User } from "../../interfaces";
import { useNavigate } from "react-router-dom";
import ReCAPTCHA from "react-google-recaptcha";

const RECAPTCHA_KEY = import.meta.env.VITE_RECAPTCHA_SITE_KEY as string;

export const LoginForm = () => {
  const { setUser, error, setError } = useRootContext();
  const [cookies, setCookie, removeCookie] = useCookies(["uhuu-token"]);
  const [cookiesUser, setCookieUser, removeCookieUser] = useCookies(["uhuu-userId"]);
  const navigate = useNavigate();

  const [form, setForm] = useState({
    email: "",
    password: "",
  });
  const [loading, setLoading] = useState(false);
  const [captcha, setCaptcha] = useState(false);

  const handleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setForm({
      ...form,
      [event.target.id]: event.target.value,
    });
  };

  const handleLogin = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    if (!form.email || !form.password) {
      setError("Preencha todos os campos");
      return;
    }

    if (!captcha) {
      setError("reCAPTCHA é obrigatório");
      return;
    }

    try {
      setLoading(true);
      const { data } = await api.post("/api/login", form);

      setCookie("uhuu-token", data.token);
      setCookieUser("uhuu-userId", data.user.id);
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
        <span>Bem vindo á administração de clientes!</span>
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

        <ReCAPTCHA
          sitekey={RECAPTCHA_KEY}
          onChange={() => setCaptcha(true)}
        />

        <div className="form-button-box">
          <button type="submit" disabled={loading}>
            {loading ? "Carregando..." : "Entrar"}
          </button>
          <span>
            Não tem uma conta?
            <span className="form-dont-have-account">
              Peça para o administrador criar uma para você!
            </span>
          </span>
        </div>
      </LoginFormWrapper>
    </LoginWrapper>
  );
};
