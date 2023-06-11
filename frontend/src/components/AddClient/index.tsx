import { useState } from "react";
import { useRootContext } from "../../context/RootContext";
import { RegisterWrapper, RegisterFormWrapper, AddClientButton } from "./styles";
import { api } from "../../config/services/api";
import Modal from "@mui/material/Modal";
import Box from "@mui/material/Box";

const style = {
  position: "absolute",
  top: "50%",
  left: "50%",
  transform: "translate(-50%, -50%)",
  width: 800,
  bgcolor: "background.paper",
  borderRadius: "10px",
  boxShadow: 24,
  p: 0,
};

export const AddClient = () => {
  const { getClients, error, setError } = useRootContext();
  const [open, setOpen] = useState(false);
  const handleOpen = () => setOpen(true);
  const handleClose = () => setOpen(false);

  const [form, setForm] = useState({
    name: "",
    email: "",
    document: "",
    address: "",
    phone: "",
    type: 0,
    status: 1,
    password: "",
  });
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
      
      setForm({
        name: "",
        email: "",
        document: "",
        address: "",
        phone: "",
        type: 0,
        status: 1,
        password: "",
      });
      getClients();
      handleClose();
    } catch (error: any) {
      console.log(error);
      setError(error.response.data.error);
    } finally {
      setLoading(false);
    }
  };
  return (
    <>
      <AddClientButton
        onClick={() => {
          handleOpen();
        }}
      >
        Cadastrar cliente
      </AddClientButton>

      <Modal open={open} onClose={handleClose} style={{ padding: 0 }}>
        <Box sx={style}>
          <RegisterWrapper>
            <div>
              <h1>Cadastrar Cliente</h1>
              <span>
                Preencha os campos abaixo para cadastrar um novo cliente.
              </span>
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

                <button type="button" className="close-modal" onClick={handleClose}>
                  Cancelar
                </button>
              </div>
            </RegisterFormWrapper>
          </RegisterWrapper>
        </Box>
      </Modal>
    </>
  );
};
