import { useState } from "react";
import { useRootContext } from "../../context/RootContext";
import {
  RegisterWrapper,
  RegisterFormWrapper,
  EditClientButton,
} from "./styles";
import { api } from "../../config/services/api";
import Modal from "@mui/material/Modal";
import Box from "@mui/material/Box";
import React, { useEffect } from "react";
import { useCookies } from "react-cookie";

interface IProps {
  id: number;
}

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

export const EditClient = ({ id }: IProps) => {
  const { getClients, error, setError } = useRootContext();
  const [open, setOpen] = useState(false);
  const [cookies, setCookie, removeCookie] = useCookies(["uhuu-token"]);
  const [loading, setLoading] = useState(false);
  const [form, setForm] = useState({
    name: "",
    email: "",
    document: "",
    address: "",
    phone: "",
    type: 1,
    status: 1,
  });

  const handleOpen = () => setOpen(true);
  const handleClose = () => setOpen(false);

  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>
  ) => {
    setForm({
      ...form,
      [event.target.id]: event.target.value,
    });
  };

  useEffect(() => {
    const getClient = async () => {
      setLoading(true);

      try {
        const response = await api.get(`/api/users/${id}`, {
          headers: {
            Authorization: `Bearer ${cookies["uhuu-token"]}`,
          },
        });

        setForm(response.data);
      } catch (error: any) {
        console.log(error);
        setError(error.response.data.error);
      } finally {
        setLoading(false);
      }
    };

    if (open) {
      getClient();
    }
  }, [open]);

  const handleRegister = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    setLoading(true);

    if (
      !form.name ||
      !form.email ||
      !form.document ||
      !form.address ||
      !form.phone
    ) {
      setError("Preencha todos os campos");
      return;
    }

    const cpfRegex = /^[0-9]{11}$/;
    if (!cpfRegex.test(form.document)) {
      setError("CPF inválido");
      return;
    }

    const phoneRegex = /^[0-9]{11}$/;
    if (!phoneRegex.test(form.phone)) {
      setError("Telefone inválido");
      return;
    }

    try {
      await api.put(`/api/users/${id}`, form, {
        headers: {
          Authorization: `Bearer ${cookies["uhuu-token"]}`,
        },
      });

      setForm({
        name: "",
        email: "",
        document: "",
        address: "",
        phone: "",
        type: 1,
        status: 1,
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
      <EditClientButton
        onClick={() => {
          handleOpen();
        }}
      >
        Editar
      </EditClientButton>

      <Modal open={open} onClose={handleClose} style={{ padding: 0 }}>
        <Box sx={style}>
          <RegisterWrapper>
            <div>
              <h1>{loading ? "Carregando..." : `Editar - ${form.name}`}</h1>
              <span>
                Edite os dados do cliente e clique em salvar para confirmar
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

                  <label htmlFor="phone">Status</label>
                  <select
                    id="status"
                    onChange={handleChange}
                    value={form.status}
                    required
                  >
                    <option value={1}>Ativo</option>
                    <option value={0}>Inativo</option>
                  </select>
                </div>
              </div>

              <div className="form-button-box">
                {error && <span style={{ color: "red" }}>{error}</span>}

                <button type="submit" disabled={loading}>
                  {loading ? "Carregando..." : "Salvar"}
                </button>

                <button
                  type="button"
                  className="close-modal"
                  onClick={handleClose}
                >
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
