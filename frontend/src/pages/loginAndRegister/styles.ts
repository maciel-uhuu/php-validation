import styled from 'styled-components';

export const LoginAndRegisterWrapper = styled.div`
  display: grid;
  grid-template-columns: 1fr 1fr;
  height: 100vh;
  place-items: center;
`;

export const LoginAndRegisterSection = styled.section`
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 20px;
  padding: 20px;
  
  width: 100%;
  height: 100%;

  background-color: ${({ theme }) => theme.colors.white};
`;


export const LogoSection = styled.section`
  display: grid;
  place-items: center;
  
  width: 100%;
  height: 100%;

  background-color: ${({ theme }) => theme.colors.primary};

  img {
    width: 100%;
    max-width: 400px;
  }

`;