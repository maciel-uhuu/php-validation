import { useState } from "react";
import { useRootContext } from "../../context/RootContext";
import { RegisterWrapper, RegisterFormWrapper } from "./styles";
import { api } from "../../config/services/api";

export const RegisterForm = () => {
  const { setHasAccount, hasAccount, setUser } = useRootContext();

  const [form, setForm] = useState({
    name: "",
    email: "",
    document: "",
    address: "",
    phone: "",
    type: 1,
    status: 1,
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

  const handleRegister = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    setLoading(true);

    if (
      !form.name ||
      !form.email ||
      !form.document ||
      !form.address ||
      !form.phone ||
      !form.password
    ) {
      setError("Preencha todos os campos");
      return;
    }

    try {
      await api.post("/api/users", form);

      setHasAccount(!hasAccount);
    } catch (error: any) {
      console.log(error);
      setError(error.response.data.error);
    } finally {
      setLoading(false);
    }
  };
  return (
    <RegisterWrapper>
      <div>
        <h1>Uhuu! - Cadastre-se</h1>
        <span>Por uma vida com mais Uhuu!</span>
      </div>

      <RegisterFormWrapper onSubmit={handleRegister}>
        <div className="form-double-inputs-box">
          <div className="form-input-box">
            <label htmlFor="name">Nome</label>
            <input
              type="text"
              id="name"
              onChange={handleChange}
              value={form.name}
              required
            />
          </div>

          <div className="form-input-box">
            <label htmlFor="email">Email</label>
            <input
              type="email"
              id="email"
              onChange={handleChange}
              value={form.email}
              required
            />
          </div>
        </div>

        <div className="form-double-inputs-box">
          <div className="form-input-box">
            <label htmlFor="document">CPF</label>
            <input
              type="number"
              id="document"
              onChange={handleChange}
              value={form.document}
              required
            />
          </div>

          <div className="form-input-box">
            <label htmlFor="address">Endereço</label>
            <input
              type="text"
              id="address"
              onChange={handleChange}
              value={form.address}
              required
            />
          </div>
        </div>

        <div className="form-double-inputs-box">
          <div className="form-input-box">
            <label htmlFor="phone">Celular</label>
            <input
              type="number"
              id="phone"
              onChange={handleChange}
              value={form.phone}
              required
              maxLength={11}
            />
          </div>

          <div className="form-input-box">
            <label htmlFor="password">Senha</label>
            <input
              type="password"
              id="password"
              onChange={handleChange}
              value={form.password}
              required
            />
          </div>
        </div>

        <div className="form-button-box">
          {error && <span style={{ color: "red" }}>{error}</span>}
          <button type="submit" disabled={loading}>
            {loading ? "Carregando..." : "Cadastrar"}
          </button>
          <span>
            Já tem uma conta?{" "}
            <span
              className="form-register-link"
              onClick={() => {
                setHasAccount(!hasAccount);
              }}
            >
              Entre
            </span>
          </span>
        </div>
      </RegisterFormWrapper>
    </RegisterWrapper>
  );
};
