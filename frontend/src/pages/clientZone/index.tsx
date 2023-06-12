import { EditClient } from "../../components/EditClient";
import { Header } from "../../components/Header";
import { useRootContext } from "../../context/RootContext";
import {
  ClientDataBox,
  ClientDataContent,
  ClientDataIntroduction,
  ClientDataItem,
  ClientDataWrapper,
} from "./styles";

export const ClientZone = () => {
  const { user } = useRootContext();

  const formatDate = (date: string) => {
    const dateObject = new Date(date);

    return dateObject.toLocaleDateString("pt-BR");
  };

  const formatPhone = (phone: string) => {
    const regex = /^(\d{2})(\d{5})(\d{4})$/;

    return phone.replace(regex, "($1) $2-$3");
  };

  const formatDocument = (document: string) => {
    const regex = /^(\d{3})(\d{3})(\d{3})(\d{2})$/;

    return document.replace(regex, "$1.$2.$3-$4");
  };

  return (
    <div>
      <Header />

      <ClientDataWrapper>
        <ClientDataIntroduction>
          <div>
            <h1>Olá, {user.name}!</h1>
            <p>Seja bem-vindo(a) à sua área do cliente.</p>
          </div>

          <EditClient id={user.id} />
        </ClientDataIntroduction>

        <ClientDataContent>
          <h2>Seus dados</h2>

          <ClientDataBox>
            <ClientDataItem>
              <div>
                <h3>Nome: </h3>
                <p>{user.name}</p>
              </div>

              <div>
                <h3>E-mail: </h3>
                <p>{user.email}</p>
              </div>
            </ClientDataItem>

            <ClientDataItem>
              <div>
                <h3>Telefone: </h3>
                <p>{formatPhone(user.phone)}</p>
              </div>

              <div>
                <h3>Documento: </h3>
                <p>{formatDocument(user.document)}</p>
              </div>
            </ClientDataItem>

            <ClientDataItem>
              <div>
                <h3>Endereço: </h3>
                <p>{user.address}</p>
              </div>

              <div>
                <h3>Data de criação: </h3>
                <p>{formatDate(user.created_at)}</p>
              </div>
            </ClientDataItem>
          </ClientDataBox>
        </ClientDataContent>
      </ClientDataWrapper>
    </div>
  );
};
