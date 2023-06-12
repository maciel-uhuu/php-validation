import styled from "styled-components";

export const ClientDataWrapper = styled.div`
  display: flex;
  flex-direction: column;
  gap: 50px;

  padding: 40px 20px;
`;

export const ClientDataIntroduction = styled.section`
  display: flex;
  gap: 5px;
  justify-content: space-between;

  h1 {
    font-size: clamp(2rem, 3vw, 2.5rem);
    color: ${({ theme }) => theme.colors.secondary};
  }

  p {
    font-size: clamp(1rem, 2vw, 1.25rem);
    color: ${({ theme }) => theme.colors.primary};
  }

  button {
    width: 120px;
    height: 60px;
  }
`;

export const ClientDataContent = styled.section`
  display: flex;
  flex-direction: column;
  gap: 20px;

  h2 {
    font-size: clamp(1.5rem, 2vw, 1.75rem);
    color: ${({ theme }) => theme.colors.primary};
  }
`

export const ClientDataBox = styled.div`
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 20px;

  padding: 20px;

  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25);
  border-radius: 10px;

  @media (max-width: 768px) {
    grid-template-columns: 1fr;

    padding: 10px;
  }
`;

export const ClientDataItem = styled.div`
  display: flex;
  flex-direction: column;
  gap: 30px;

  h3 {
    font-size: clamp(1rem, 2vw, 1.25rem);
    color: ${({ theme }) => theme.colors.secondary};
  }

  p {
    font-size: clamp(1rem, 2vw, 1.25rem);
    color: ${({ theme }) => theme.colors.primary};
  }
`;  
