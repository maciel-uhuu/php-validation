import { useEffect, useState } from "react";
import { Header } from "../../components/Header";
import { useRootContext } from "../../context/RootContext";
import { User } from "../../interfaces";
import {
  ActionsWrapper,
  HomeContent,
  HomeIntroduction,
  HomeWrapper,
  PaginationWrapper,
  PginationContent,
} from "./styles";
import {
  Paper,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TableRow,
} from "@mui/material";
import { AddClient } from "../../components/AddClient";
import { EditClient } from "../../components/EditClient";
import { api } from "../../config/services/api";
import { useCookies } from "react-cookie";

export const Home = () => {
  const { user, getClients, clients } = useRootContext();
  const [data, setData] = useState<User[]>([]);
  const [cookies, setCookie, removeCookie] = useCookies(["uhuu-token"]);

  useEffect(() => {
    getClients();
  }, []);

  useEffect(() => {
    setData(clients);
  }, [clients]);

  const handleDelete = async (id: number) => {
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

        <TableContainer component={Paper}>
          <Table sx={{ minWidth: 650 }} aria-label="simple table">
            <TableHead>
              <TableRow>
                <TableCell align="center">ID</TableCell>
                <TableCell align="center">Nome</TableCell>
                <TableCell align="center">Email</TableCell>
                <TableCell align="center">Celular</TableCell>
                <TableCell align="center">Endereço</TableCell>
                <TableCell align="center">Documento</TableCell>
                <TableCell align="center">Status</TableCell>
                <TableCell align="center">Ações</TableCell>
              </TableRow>
            </TableHead>
            <TableBody>
              {data.map((data: User) => (
                <TableRow
                  key={data.id}
                  sx={{ "&:last-child td, &:last-child th": { border: 0 } }}
                >
                  <TableCell align="center">{data.id}</TableCell>
                  <TableCell align="center">{data.name}</TableCell>
                  <TableCell align="center">{data.email}</TableCell>
                  <TableCell align="center">{data.address}</TableCell>
                  <TableCell align="center">{data.document}</TableCell>
                  <TableCell align="center">{data.phone}</TableCell>
                  <TableCell align="center">
                    {data.status === 1 ? "Ativo" : "Inativo"}
                  </TableCell>
                  <TableCell align="center">
                    <ActionsWrapper>
                      <EditClient id={data.id} />
                      <button
                        className="delete-client-button"
                        onClick={() => {
                          handleDelete(data.id);
                        }}
                      >
                        Excluir
                      </button>
                    </ActionsWrapper>
                  </TableCell>
                </TableRow>
              ))}
              <TableRow>
                <TableCell></TableCell>
                <TableCell></TableCell>
                <TableCell></TableCell>
                <TableCell></TableCell>
                <TableCell></TableCell>
                <TableCell></TableCell>
                <TableCell></TableCell>
                <TableCell align="right">
                  <PaginationWrapper>
                    <span className="span-page">Pag: 1</span>

                    <PginationContent>
                      <span className="span-page">Qtd por página: </span>
                      <select
                        className="span-page"
                        name="qtdPerPage"
                        id="qtdPerPage"
                      >
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                      </select>

                      <button type="button">Anterior</button>
                      <button type="button">Próxima</button>
                    </PginationContent>
                  </PaginationWrapper>
                </TableCell>
              </TableRow>
            </TableBody>
          </Table>
        </TableContainer>
      </HomeContent>
    </HomeWrapper>
  );
};
