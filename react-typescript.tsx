//using typescript with styled component how he pass the boolean disabled with grace
//He passed via disabled
const SliderInput = styled.input<{ disabled?: boolean }>`
  -webkit-appearance: none;
  width: 52px;
  height: 22px;
  border-radius: 10px;
  border: 1px solid ${MIS_BLUE};
  outline: none;
  transition: 0.2s;
  margin-right: 10px;
  background-color: #aaafaa;
  //He's using it on the cursor guide here
  cursor: ${(props) => (props.disabled ? "not-allowed" : "pointer")};

  //He change opacity with it
  ${(props) => props.disabled && "opacity: 0.5;"}

  &:checked {
    background-color: #4caf50;
  }

  &::before {
    content: "";
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: white;
    position: absolute;
    //He change some position with it
    transform: translateX(${(props) => (props.checked ? "30px" : "0")});
    transition: 0.2s;
   //Again the opacity thing
    ${(props) => props.disabled && "opacity: 0.5;"}
  }
`;

      //USAGE 
       <SliderInput
          disabled={disabled}
          type="checkbox"
        />


//====================== now lets clear the backdrop on react bootstrap =-===================
 setTimeout(() => {
        const backdrop = document.querySelector(".modal-backdrop.fade.show");
        backdrop && backdrop.remove();
      }, 500);
