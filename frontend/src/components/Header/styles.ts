import styled from "styled-components";

export const HeaderWrapper = styled.header`
  display: flex;
  align-items: center;
  justify-content: space-between;

  width: 100%;
  height: 80px;

  padding: 0 20px;

  background-color: ${({ theme }) => theme.colors.primary};
  color: ${({ theme }) => theme.colors.white};

  

`;

export const HeaderNav = styled.nav`
  display: flex;
  align-items: center;
  justify-content: space-between;

  gap: 20px;

  img {
    width: 100px;
    height: 80px;
  }

  a {
    color: ${({ theme }) => theme.colors.white};
    font-size: clamp(1rem, 2vw, 1.25rem);
    text-decoration: none;
    transition: color 0.2s ease-in-out;

    &:hover {
      color: ${({ theme }) => theme.colors.secondary};
    }
  }
`;

export const HeaderUser = styled.div`
  display: flex;
  align-items: center;
  justify-content: space-between;

  gap: 20px;

  span, .logout {
    font-size: clamp(1rem, 2vw, 1.25rem);
  }

  .logout {
    color: ${({ theme }) => theme.colors.secondary};
    cursor: pointer;

    &:hover {
      text-decoration: underline;
    }
  }

`;