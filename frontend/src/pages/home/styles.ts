import styled from "styled-components";

export const HomeWrapper = styled.div`
  display: flex;
  flex-direction: column;
  gap: 20px;

  width: 100%;
  height: 100%;

  background-color: ${({ theme }) => theme.colors.white};
`;

export const HomeIntroduction = styled.section`
  display: flex;
  align-items: center;
  justify-content: space-between;

  width: 100%;
`;

export const HomeContent = styled.section`
  display: flex;
  flex-direction: column;
  gap: 20px;

  width: 100%;
  height: 100%;

  padding: 20px;

  h1 {
    color: ${({ theme }) => theme.colors.secondary};
    font-size: clamp(2rem, 5vw, 2.5rem);
  }

  span {
    color: ${({ theme }) => theme.colors.primary};
    font-size: clamp(1rem, 2vw, 1.25rem);
  }
`;

export const ActionsWrapper = styled.div`
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;

  .delete-client-button {
    padding: 5px;
    font-size: clamp(1rem, 2vw, 1rem);
    background-color: #B31312;
    color: ${({ theme }) => theme.colors.white};
    border-radius: 5px;

    transition: background-color 0.2s ease-in-out;

    &:hover {
      background-color: ${({ theme }) => theme.colors.primary};
    }
  }
`;

export const PaginationWrapper = styled.div`
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;

  width: 100%;

  .span-page {
    color: ${({ theme }) => theme.colors.primary};
    font-size: 0.75rem;
    font-weight: 600;
  }
`;

export const PginationContent = styled.div`
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;

  button {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid ${({ theme }) => theme.colors.primary};
    background-color: ${({ theme }) => theme.colors.white};
    color: ${({ theme }) => theme.colors.primary};

    transition: all 0.2s ease-in-out;
    &:hover {
      background-color: ${({ theme }) => theme.colors.primary};
      color: ${({ theme }) => theme.colors.white};
    }
  }
`;
