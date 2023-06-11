import styled from "styled-components";

export const RegisterWrapper = styled.section`
  text-align: center;

  h1 {
    color: ${({ theme }) => theme.colors.secondary};
    font-size: clamp(2rem, 5vw, 2.5rem);
  }

  span {
    color: ${({ theme }) => theme.colors.primary};
    font-size: clamp(1rem, 2vw, 1.25rem);;
  }
`;

export const RegisterFormWrapper = styled.form`
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 20px;

  width: 100%;
  padding: 60px;
  margin-top: 20px;

  background-color: ${({ theme }) => theme.colors.white};

  border-radius: 10px;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
  text-align: left;

  .form-double-inputs-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;

    width: 100%;

    @media (max-width: 768px) {
      flex-direction: column;
    }
  }

  .form-input-box {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 5px;

    width: 100%;


    label {
      color: ${({ theme }) => theme.colors.primary};
      font-size: clamp(1rem, 2vw, 1.25rem);
    }

    input {
      font-size: clamp(1rem, 2vw, 1.25rem);

      width: 100%;
      height: 40px;
      padding: 0 10px;

      border: 1px solid ${({ theme }) => theme.colors.primary};
      border-radius: 5px;

      outline: none;
      transition: border-color 0.2s ease-in-out;

      &:focus {
        border-color: ${({ theme }) => theme.colors.secondary};
      }
    }
  }

  .form-button-box {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 20px;

    width: 100%;

    button {
      padding: 10px 30px;
      font-size: clamp(1rem, 2vw, 1.25rem);
      background-color: ${({ theme }) => theme.colors.secondary};
      color: ${({ theme }) => theme.colors.white};
      border-radius: 5px;

      transition: background-color 0.2s ease-in-out;

      &:hover {
        background-color: ${({ theme }) => theme.colors.primary};
      }
    }

    span {
      color: ${({ theme }) => theme.colors.primary};
      font-size: clamp(1rem, 2vw, 1.25rem);

      .form-register-link {
        color: ${({ theme }) => theme.colors.secondary};
        font-weight: bold;
        cursor: pointer;

        &:hover {
          text-decoration: underline;
        }
      }
    }
  }
`;
