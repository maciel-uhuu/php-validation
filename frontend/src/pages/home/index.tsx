import { useEffect, useState } from "react";
import { Header } from "../../components/Header";
import { useRootContext } from "../../context/RootContext";
import { User } from "../../interfaces";
import {
  ActionsWrapper,
  HomeContent,
  HomeFilterWrapper,
  HomeIntroduction,
  HomeWrapper,
} from "./styles";
import { DataGrid } from "@mui/x-data-grid";

import { AddClient } from "../../components/AddClient";
import { EditClient } from "../../components/EditClient";
import { api } from "../../config/services/api";
import { useCookies } from "react-cookie";
import { filterOptions } from "../../constants/filterOptions";

export const Home = () => {
  const { user, getClients, data, setError, error } = useRootContext();
  const [clients, setClients] = useState<User[]>([]);
  const [count, setCount] = useState(0);
  const [page, setPage] = useState(1);
  const [paginationModel, setPaginationModel] = useState({
    pageSize: 10,
    page: 0,
  });
  const [cookies, setCookie, removeCookie] = useCookies(["uhuu-token"]);
  const [filter, setFilter] = useState({
    key: "name",
    value: "",
  });

  useEffect(() => {
    getClients();
  }, []);

  useEffect(() => {
    setClients(data.data as User[]);
    setCount(data.total);
    setPage(data.page);
  }, [data]);

  console.log(clients);

  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>
  ) => {
    setFilter({
      ...filter,
      [event.target.id]: event.target.value,
    });
  };

  const handleFilter = async () => {
    if (filter.value === "") {
      setError("Preencha o campo de filtro");
      return;
    }

    if (filter.value.length < 3) {
      setError("O campo de filtro deve ter no mínimo 3 caracteres");
      return;
    }

    try {
      const { data } = await api.get("/api/users/filter", {
        params: {
          key: filter.key,
          value: filter.value,
        },
        headers: {
          Authorization: `Bearer ${cookies["uhuu-token"]}`,
        },
      });

      setClients(data.data);
    } catch (error: any) {
      console.log(error);
      setError(error.response.data.error);
    }
  };

  const handleDelete = async (id: number) => {
    if (!window.confirm("Deseja realmente excluir esse cliente?")) return;

    try {
      await api.delete(`/api/users/${id}`, {
        headers: {
          Authorization: `Bearer ${cookies["uhuu-token"]}`,
        },
      });

      getClients();
    } catch (error) {
      console.log(error);
    }
  };

  return (
    <HomeWrapper>
      <Header />

      <HomeContent>
        <HomeIntroduction>
          <div>
            <h1>Bem vindo, {user.name || "User"}!</h1>
            <span>Aqui você pode cadastrar e visualizar os clientes.</span>
          </div>

          <AddClient />
        </HomeIntroduction>

        <HomeFilterWrapper>
          <div>
            <span>Filtrar por: </span>
            <input
              type="text"
              id="value"
              value={filter.value}
              onChange={handleChange}
            />
            <select
              name="key"
              id="key"
              onChange={handleChange}
              value={filter.key}
            >
              {filterOptions.map((option) => {
                return <option value={option.value}>{option.label}</option>;
              })}
            </select>
          </div>
          <button type="button" onClick={handleFilter}>
            Filtrar
          </button>
          <button
            type="button"
            onClick={() => {
              getClients();
              setFilter({
                key: "name",
                value: "",
              });
            }}
            disabled={filter.value === ""}
            className="clear-button"
          >
            Limpar
          </button>
        </HomeFilterWrapper>

        {error && <span style={{ color: "red" }}>{error}</span>}

        <DataGrid
          rows={clients}
          rowCount={count}
          columns={[
            { field: "id", headerName: "ID", width: 70 },
            { field: "name", headerName: "Nome", width: 200 },
            { field: "email", headerName: "Email", width: 200 },
            { field: "phone", headerName: "Celular", width: 200 },
            { field: "address", headerName: "Endereço", width: 200 },
            { field: "document", headerName: "Documento", width: 200 },
            {
              field: "status",
              headerName: "Status",
              width: 200,
            },
            {
              field: "actions",
              headerName: "Ações",
              width: 200,
              renderCell: (params) => (
                <ActionsWrapper>
                  <EditClient id={params.row.id} />
                  <button
                    type="button"
                    onClick={() => handleDelete(params.row.id)}
                    className="delete-client-button"
                  >
                    Excluir
                  </button>
                </ActionsWrapper>
              ),
            },
          ]}
          checkboxSelection
          disableRowSelectionOnClick
          disableColumnFilter
          disableColumnMenu
          autoPageSize={false}
          onPaginationModelChange={(params) => {
            setPaginationModel(params);
            getClients(params.page + 1, params.pageSize);
          }}
          paginationModel={paginationModel}
          paginationMode="server"
          pageSizeOptions={[5, 10, 25]}
        />
      </HomeContent>
    </HomeWrapper>
  );
};
