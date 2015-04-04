public final class UssdApiResponse {

   /*** Represents the type of USSD request sent.*/
   public String Type;

   /*** Represents the actual text entered by the mobile subscriber.  
   */ 
   public String Message;

  /*** Represents data that API client asked API service to send from the  
  * previous USSD request. This data is only sent in the current request and 
  * is then discarded
  */
  public String ClientState;

   /*** Default constructor to set the initial values of the class*/
   public UssdApiResponse() {
   }
}