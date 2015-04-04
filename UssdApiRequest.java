public final class UssdApiRequest {

  /*** Represents the telephone number of the mobile subscriber.*/ 
  public String Mobile;

  /*** Represents the unique Id of the current session. It is UUID or GUID  
  * depending upon the system.  
  */
  public String SessionId;

   /*** Represents the type of USSD request sent.*/
   public String Type;

   /*** Represents the actual text entered by the mobile subscriber. For  
   * INITIATION, this will represent the USSD string entered  
   * by the subscriber. 
   * For RESPONSE, this will be the message  
   * sent.  
   */ 
   public String Message;

  /*** Indicates the telecommunication mobile network the subscriber belongs to.*/ 
  public String Operator;

  /*** Indicates the position of the current message in the USSD session.*/
  public Integer Sequence; 

  /*** Represents data that API client asked API service to send from the  
  * previous USSD request. This data is only sent in the current request and 
  * is then discarded
  */
  public String ClientState;

  /*** Represents the USSD Service code assigned by the network.*/
   public String ServiceCode;

   /*** Default constructor to set the initial values of the class*/
   public UssdApiRequest() {
     Mobile = "";
     SessionId = "";
     Type = "Initiation";
     Message = "";
     Operator = "";
     Sequence = 0;
     //ClientState = "";
     ServiceCode = "";
   }

   @Override public String toString() {
    return String.format("UssdRequest "
        +"[Mobile=%s, SessionId=%s, Type=%s, Message=%s, Operator=%s, "+
       " Sequence=%s, ClientState=%s, ServiceCode=%s]",
        Mobile, SessionId, Type, 
         Message, Operator, Sequence,     
           /* ClientState,*/ ServiceCode);
  }
}
