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

export const HomeFilterWrapper = styled.section`
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 15px;

  div:last-child {
    display: flex;
    gap: 10px;
  }

  input, select {
    font-size: clamp(1rem, 2vw, 1rem);
    

    padding: 8px 5px;
    border-radius: 5px 0 0 5px;
    border: 1px solid ${({ theme }) => theme.colors.primary};
    border-right: none;
    background-color: ${({ theme }) => theme.colors.white};
    color: ${({ theme }) => theme.colors.primary};
  }

  select {
    background: ${({ theme }) => theme.colors.primary};
    color: ${({ theme }) => theme.colors.white};
    border: 1px solid ${({ theme }) => theme.colors.primary};
    border-left: none;
    border-radius: 0px 5px 5px 0px;
  }

  button, .clear-button {
    padding: 10px;
    font-size: clamp(1rem, 2vw, 1rem);
    background-color: ${({ theme }) => theme.colors.secondary};
    color: ${({ theme }) => theme.colors.white};

    border-radius: 5px;

    transition: background-color 0.2s ease-in-out;

    &:hover {
      background-color: ${({ theme }) => theme.colors.primary};
    }

    &:disabled {
      cursor: not-allowed;
    }
  }

  .clear-button {
    background-color: ${({ theme }) => theme.colors.tertiary};
  }

  @media (max-width: 768px) {
    flex-direction: column;
  }
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
