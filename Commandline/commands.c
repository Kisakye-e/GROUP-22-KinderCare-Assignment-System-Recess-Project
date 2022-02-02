#include <stdio.h>
#include <stdlib.h>
#include<winsock.h>
#include<mysql.h>
#include<string.h>

 MYSQL *conn;
 MYSQL_RES *res;
 MYSQL_ROW row;


char q[1000];
char r[1000];
char usercodeEntered[10];
char passwordEntered[10];

void enter();
//void finish_with_error();
void check_activation()
{
     char query_string[] = {"SELECT activationstatus FROM pupil where  userCode = '%s' and password = '%s'"};
		sprintf(r, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, r)) {
			//fprintf(stderr, "%s\n", mysql_error(conn));
			//exit(1);

			 finish_with_error(conn);


		}

res=mysql_store_result(conn);
      if(res==NULL){
            finish_with_error(conn);
        }

       int num_fields=mysql_num_fields(res);
           while((row=mysql_fetch_row(res))){
            for(int i=0; i<num_fields; i++){
                printf("%s\t", row[i]?row[i]: "NULL");
            }
            printf("\n");
        }
}

void finish_with_error(MYSQL *conn)
{
    fprintf(stderr, "%s\n",mysql_error(conn));
    mysql_close(conn);
    exit(1);
}

int main()
{
     char *server = "localhost";
     char *user = "root";
     char *password = "";
     char *database = "kindercare";



     char command[1000];
     char startDate[20];
     char endDate[20];
     int totalAssignments;

     //char *assignmentNo;
     /*char *buffer1;
     char *buffer2;
     char *buffer3;
     char *buffer4;
     char *buffer5;*/

    //connecting to the database
    conn= mysql_init(NULL);
  conn = (mysql_real_connect(conn, server, user, password, database, 0, NULL, 0));
  if(conn)
     {
       printf("Connection successful.\n");
     }
     else{
        printf("Failed to connect.\n");
     }
   printf("============================================================================\n");
   printf("================KINDERCARE ASSIGNMENT MANAGEMENT SYSTEM=====================\n");
   printf("============================================================================\n\n");
     //pupil logs in
    printf("Enter your user code:\n");
      scanf("%s",usercodeEntered );

    printf("Enter your password:\n");
    scanf("%s", passwordEntered);




    char query_string[] = {"SELECT * FROM pupil where  userCode = '%s' and password = '%s' "};
		sprintf(q, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, q)) {
			//fprintf(stderr, "%s\n", mysql_error(conn));
			//exit(1);
			 finish_with_error(conn);
		}

		res = mysql_store_result(conn);

		if((row= mysql_fetch_row(res)) > 0) {

     printf("Below are the commands that you can use:\n");
     printf("     1.Viewall\n");
     printf("     2.Checkstatus\n");
     printf("     3.Viewassignment assignmentid\n");
     printf("     4.Checkdates datefrom dateto\n");
     printf("     5.Check ActivationStatus\n");
     printf("     6.Attemptassignment\n");
     printf("     7.RequestActivation\n\n");

     printf("Enter a command\n");
     scanf("%s", command);



      char a[]="Check_Activation_Status";
      char b[]="RequestActivation";
      char c[]="Viewall";
      char d[]="Checkdates";
      char e[]="Attemptassignment";

     if(strcmp(command,a)==0){
    // check_activation(usercodeEntered,passwordEntered);

    check_activation();

  }


 else if(strcmp(command,b)==0)
  {
      char query_string[] = {"UPDATE pupil SET requeststatus= 'Pending' where  userCode = '%s' AND password = '%s' AND activationstatus = 'deactivated' "};
		sprintf(r, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, r)) {
			//fprintf(stderr, "%s\n", mysql_error(conn));
			//exit(1);

			 finish_with_error(conn);


		}

printf("Activation Request has been successfully sent");

  }


 else if(strcmp(command,c)==0)
 {
     char query_string[] = {"SELECT AssignmentNo,startDate,endDate FROM submiitedassignment WHERE teacherNo=(SELECT teacherNo FROM pupil where userCode = '%s' and password= '%s')"};
     sprintf(r, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, r))
        {
           finish_with_error(conn);

        }
     res=mysql_store_result(conn);
      if(res==NULL){
            finish_with_error(conn);
        }

       int num_fields=mysql_num_fields(res);
           while((row=mysql_fetch_row(res))){
            for(int i=0; i<num_fields; i++){
                printf("%s\t", row[i]?row[i]: "NULL");
            }
            printf("\n");
        }

 }

 else if(strcmp(command,d)==0)
 {
     char start[30],end[30];
     printf("Enter startdate yy-mm-dd:");
     scanf("%s",start);

     printf("Enter enddate yy-mm-dd:");
     scanf("%s",end);


    //checking for pupil's user code and password in the database
    char query_string[]="SELECT * FROM submiitedassignment where startDate >= '%s' AND endDate <= '%s' AND teacherNo=(SELECT teacherNo FROM pupil where userCode ='%s')";
    sprintf(q,query_string,start,end,usercodeEntered);
    if(mysql_query(conn,q))
    {
        finish_with_error(conn);
    }

    res=mysql_store_result(conn);
    if(res==NULL)
    {
        finish_with_error(conn);
    }


       int num_fields=mysql_num_fields(res);
           while((row=mysql_fetch_row(res))){
            for(int i=0; i<num_fields; i++){
                printf("%s\t", row[i]?row[i]: "NULL");
            }
            printf("\n");
        }

		}

		else if(strcmp(command, e)==0) {
                char assignmentid[20];
                printf("\nEnter assignmentid: ");
                scanf("%s", assignmentid);
             char query_string[]="SELECT Assignment FROM submiitedassignment where AssignmentNo = '%s' AND teacherNo=(SELECT teacherNo FROM pupil where userCode ='%s')";
    sprintf(q,query_string,assignmentid, usercodeEntered);
    if(mysql_query(conn,q))
    {
        finish_with_error(conn);
    }

    res=mysql_store_result(conn);
    if(res==NULL)
    {
        finish_with_error(conn);
    }

char assignment[30];
       int num_fields=mysql_num_fields(res);
           while((row=mysql_fetch_row(res))){
                strcpy(assignment, row[0]);
                for(int i=0;i<strlen(assignment);++i)
                {
                    printf("Letter %c",assignment[i]);
                    printf("\n");
                }
        }

		}

		}

 else
 {
     printf("Incorrect usercode or password");
 }


//    char usercode[] = mysql_query(conn,"SELECT (userCode) FROM pupil WHERE userCode= usercodeEntered");


  /*  if(mysql_query(conn, "SELECT firstName FROM pupil" ))
    {


            finish_with_error(conn);
    }


 res=mysql_store_result(conn);
      if(res==NULL){
            finish_with_error(conn);
        }
        int num_fields=mysql_num_fields(res);
           while((row=mysql_fetch_row(res))){
            for(int i=0; i<num_fields; i++){
                printf("%s\t", row[i]?row[i]: "NULL");
            }
            printf("\n");
        }*/



        return 0;
}


    //if()
    //enter();

/*if ((strlenusercode>0)&&(strlen(password)>0))
    {
    printf("Successfully logged in.\n\n");
    //enter();
     printf("Below are the commands that you can use:\n");
     printf("     1.Viewall\n");
     printf("     2.Checkstatus\n");
     printf("     3.Viewassignment assignmentid\n");
     printf("     4.Checkdates datefrom dateto\n");
     printf("     5.Check ActivationStatus\n");
     printf("     6.Attemptassignment\n");
     printf("     7.RequestActivation\n\n");

     printf("Enter a command\n");
     scanf("%s", command);
    }

 else{
    printf("Wrong userCode or password");
  }
  */
  /*if(command='Viewall'){
    view_data();
  }

  if(command='Checkstatus'){
    check_status();
  }

  if(command='Viewassignment assignmentid'){
    view_assignment();
  }

  if(command='Checkdates datefrom dateto'){

        printf("Enter first date:\n");
        scanf("%s", &startDate);
        printf("Enter second date:\n");
        scanf("%s", &endDate);
    check_dates();
  }

  if(command='RequestActivation'){
    request_activation();
  }

  /*switch(&command)
    {
    case View_all:
        buffer1 = view_data();
        break;

    case check_status:
       buffer = status();
        break;

    case View_assignment:
        buffer3 = assignment();
        break;

    case Attempt_assignment;
        buffer4 = attempt();

    case Check_dates:
         buffer5 = dates();
        break;

    case Request_activation:
        activation();
        break;

    default:
        printf("Invalid command");
        break;
    }*/
//viewall command

//check datesto datefrom command
void enter()
{
    system("cls");
}

/*view_data(
 if(mysql_query(conn, (SELECT (assignmentNumber, StartDate, EndDate, Status) FROM submitted assignments WHERE(SELECT userCode FROM pupil WHERE userCode = &userCodeEntered))))
   {
    result = mysql_store_result(conn);
    printf("ALL SUBMITTED ASSIGNMENTS\n");
  }
);

//checkstatus command
  check_status()

view_assignments(
  if(mysql_query(conn, (SELECT * FROM submitted assignments WHERE assignmentNumber = &assignmentNo)))
    {
    result =mysql_store_result(conn);

    printf("Details of assignment %s\n", &assignmentNo);
  while((row =mysql_fetch_row(result)!= 0)){
    printf("%s\n", row[0]);
  }
}
);

check_dates(
if(mysql_query(conn, (SELECT(assignmentNo, assignment)FROM submitted assignments WHERE START = &startdate AND END = &enddate)))
{
    result = mysql_use_result(conn);
    totalAssigments = mysql_num_rows(result);

    printf("Assignments between %s and %s = %d", totalAssignments, startDate, endDate);
}
);*/



//request activation command
//attempt assignment command
