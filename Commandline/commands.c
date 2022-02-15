#include <stdio.h>
#include <stdlib.h>
#include<winsock.h>
#include<mysql.h>
#include<string.h>
#include<time.h>

 MYSQL *conn;
 MYSQL_RES *res;
 MYSQL_RES *result;
 MYSQL_ROW row;
 time_t difference;
 time_t total_time;
 char assignmentid[20];
 int deadline_status = 0;
 void timing(char *end_time );

char matrix[28]={'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2'};
char matrix_a[29]={' ','*',' ',' ','*','*','*',' ','*',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_b[29]={'*','*','*','*','*',' ',' ','*','*','*','*',' ','*','*','*',' ','*',' ',' ','*','*',' ',' ','*','*','*','*','*'};
char matrix_c[29]={' ',' ','*','*',' ','*',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ',' ','*',' ',' ',' ',' ','*','*',};
char matrix_d[29]={'*',' ',' ',' ','*','*',' ',' ','*',' ','*',' ','*',' ',' ','*','*',' ',' ','*','*','*','*',' ',' ',' ',' ',' '};
char matrix_e[29]={'*','*','*','*','*',' ',' ',' ','*',' ',' ',' ','*','*','*','*','*',' ',' ',' ','*',' ',' ',' ','*','*','*','*'};
char matrix_f[29]={'*','*','*','*','*',' ',' ',' ','*',' ',' ',' ','*','*','*','*','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' '};
char matrix_g[29]={' ',' ','*','*',' ','*',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ','*','*',' ','*',' ','*',' ',' ','*','*'};
char matrix_h[29]={'*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*','*','*','*','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*'};
char matrix_i[29]={'*','*','*',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ','*','*','*',' '};
char matrix_j[29]={'*','*','*',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*',' ',' '};
char matrix_k[29]={'*',' ',' ','*','*',' ','*',' ','*','*',' ',' ','*',' ',' ',' ','*','*',' ',' ','*',' ','*',' ','*',' ',' ','*'};
char matrix_l[29]={'*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*','*','*','*'};
char matrix_m[28]={'*',' ',' ','*','*','*','*','*','*',' ',' ','*','*',' ',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_n[28]={'*',' ',' ','*','*','*',' ','*','*',' ','*','*','*',' ',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_o[28]={' ','*','*',' ','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*',' ','*','*',' '};
char matrix_p[28]={'*','*','*',' ','*',' ',' ','*','*',' ',' ','*','*','*','*',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' '};
char matrix_q[28]={' ','*','*',' ','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*',' ','*','*',' ','*','*','*'};
char matrix_r[28]={'*','*','*',' ','*',' ',' ','*','*',' ',' ','*','*','*','*',' ','*',' ','*',' ','*',' ',' ','*','*',' ',' ','*'};
char matrix_s[28]={' ','*','*',' ','*',' ',' ','*','*',' ',' ',' ',' ','*','*',' ',' ',' ',' ','*','*',' ',' ','*',' ','*','*',' '};
char matrix_t[28]={'*','*','*',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_u[28]={'*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*','*',' ',' ','*',' ','*','*',' '};
char matrix_v[28]={'*',' ',' ','*',' ','*',' ','*',' ',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_w[28]={'*',' ',' ','*','*',' ',' ','*','*','*','*','*','*',' ',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_x[28]={'*',' ',' ','*',' ','*','*',' ',' ','*','*',' ','*',' ',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_y[28]={'*',' ',' ','*',' ','*',' ','*',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ',' ',' '};
char matrix_z[28]={'*','*','*','*',' ',' ','*',' ',' ','*',' ',' ','*',' ',' ',' ','*','*','*','*',' ',' ',' ',' ',' ',' ',' ',' '};

char matrix_entered[29];
 int position;



char q[1000];
char r[1000];
char s[1000];
char t[1000];
char usercodeEntered[10];
char passwordEntered[10];

void enter();
void answer();
float attempt(ch);
float k;
char assignmentNo[10];

//void finish_with_error();
void check_activation()
{

    char activated[10];
    char activate[20]= "1";

     char query_string[] = {"SELECT activationStatus FROM pupils where  userCode = '%s' and password = '%s'"};
		sprintf(r, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, r)) {
			 finish_with_error(conn);
		}

res = mysql_store_result(conn);


           while((row=mysql_fetch_row(res))){
               strcpy(activated,row[0]);

               if(strcmp(activated,activate)==0)
               {
                   printf("You are activated");
               }

               else
               {
                   printf("You have been deactivated");
               }

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
      fflush(stdin);

    printf("Enter your password:\n");
    scanf("%s", passwordEntered);
    fflush(stdin);




    char query_string[] = {"SELECT * FROM pupils where  userCode = '%s' and password = '%s' "};
		sprintf(q, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, q)) {

			 finish_with_error(conn);
		}

		res = mysql_store_result(conn);

		if((row= mysql_fetch_row(res)) > 0) {
for(;;)
{

printf("\n\n\n");
     printf("Below are the commands that you can use:\n");
     printf("     1.Viewall\n");
     printf("     2.Checkstatus\n");
     printf("     3.Viewassignment assignmentid\n");
     printf("     4.Checkdates datefrom dateto\n");
     printf("     5.CheckActivationStatus\n");
     printf("     6.Attemptassignment\n");
     printf("     7.RequestActivation\n\n");
     printf("     8.Logout\n\n");

     printf("Enter a command\n\n");
     gets(command);
     fflush(stdin);
     printf("\n\n\n");


      char a[]="CheckActivationStatus";
      char b[]="RequestActivation";
      char c[]="Viewall";
      char d[]="Checkdates";
      char e[]="Attemptassignment";
      char f[]="Logout";
      char g[]="Viewassignment";
      char h[]="Checkstatus";

     if(strcmp(command,a)==0){

    check_activation();

  }


 else if(strcmp(command,b)==0)
  {
      char activated[10];
    char activate[20]= "1";

     char query_string[] = {"SELECT activationStatus FROM pupils where  userCode = '%s' and password = '%s'"};
		sprintf(r, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, r)) {
			 finish_with_error(conn);
		}

res=mysql_store_result(conn);


           while((row=mysql_fetch_row(res))){
               strcpy(activated,row[0]);

               if(strcmp(activated,activate)==0)
               {
                   printf("You are already activated");
               }

               else
               {





      char query_string[] = {"UPDATE pupils SET requestStatus= 'Pending' where  userCode = '%s' AND password = '%s' AND activationStatus = '0' "};
		sprintf(r, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, r)) {
			 finish_with_error(conn);
		}

printf("Activation Request has been successfully sent");
               }
           }
  }


 else if(strcmp(command,c)==0)
 {
     char date[30], assignmentId[30];
     char query_string[] = {"SELECT assignmentnumber,startDate FROM submittedassignment WHERE teacherNumber=(SELECT teacherNumber FROM pupils where userCode = '%s' and password= '%s')"};
     sprintf(r, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, r))
        {
           finish_with_error(conn);

        }
     res = mysql_store_result(conn);
          printf("Assignment Number \t StartDate  \t  Status");
            while((row=mysql_fetch_row(res)) != NULL){

                    char query[]="SELECT * FROM attemptedassignment WHERE userCode= '%s' AND assignmentnumber= '%s' ";
                    sprintf(q,query,usercodeEntered,row[0]);
                    strcpy(date, row[1]);
                    strcpy(assignmentId, row[0]);

            if(mysql_query(conn, q)) {
                printf("\nerror");
                exit(1);
            }

            result = mysql_store_result(conn);

            if((row = mysql_fetch_row(result)) == NULL) {
                printf("\n%s \t\t\t %s  \t Not Attempted", assignmentId, date);
            }
            else {
                printf("\n%s \t\t\t %s  \t Attempted", assignmentId, date);
            }

        }

 }

 else if(strncmp(command,d,strlen(d))==0)
 {


     char start[30],end[30];

     char *str1 = strtok(command," ");
     char *str2 = strtok(NULL," ");
     char *str3= strtok(NULL," ");



    //checking for pupil's user code and password in the database
    char query_string[]="SELECT assignmentnumber,startDate,startTime,endTime FROM submittedassignment where startDate BETWEEN  '%s' AND  '%s' AND teacherNumber=(SELECT teacherNumber FROM pupils where userCode ='%s')";
    sprintf(q,query_string,str2,str3,usercodeEntered);
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
            printf("%s  %s  %s  %s", row[0], row[1], row[2], row[3]);
            printf("\n");
        }

		}

		else if(strcmp(command, e)==0) {


    char activated[10];
    char activate[20]= "0";

     char query_string[] = {"SELECT activationStatus FROM pupils where  userCode = '%s' and password = '%s'"};
		sprintf(r, query_string,usercodeEntered,passwordEntered);
		if (mysql_query(conn, r)) {
			 finish_with_error(conn);
		}

     res=mysql_store_result(conn);
      if(res==NULL){
            finish_with_error(conn);
        }


           while((row=mysql_fetch_row(res))){
               strcpy(activated,row[0]);

               if(strcmp(activated,activate)==0)
               {
                   printf("You have been deactivated");
               }

               else
               {

                printf("\nEnter assignmentid: ");
                scanf("%s", assignmentid);
                fflush(stdin);


                char attempted[10];
                char query[] = {"SELECT assignmentnumber FROM attemptedassignment where  userCode = '%s'  and assignmentnumber = '%s'"};
		sprintf(q, query,usercodeEntered,assignmentid);
		if (mysql_query(conn, q)) {
			//fprintf(stderr, "%s\n", mysql_error(conn));
			//exit(1);
			 finish_with_error(conn);
		}


     res = mysql_store_result(conn);

           if((row = mysql_fetch_row(res)) > 0){
                   printf("\nYou have already attempted this assignment");
               }

                else{
    char hours[5], minutes[5], seconds[5], year[10], month[5], day[5];
    time_t now;
    char endTime[10];
    time(&now);

    struct tm *thisTime = localtime(&now);
    sprintf(year, "%d", thisTime->tm_year + 1900);
    sprintf(month, "%d", thisTime->tm_mon+1);
    sprintf(day, "%d", thisTime->tm_mday);

    char date[20];
    char dash[]="-";

    strcpy(date,year);
    strcat(date,dash);
    strcat(date, month);
    strcat(date, dash);
    strcat(date, day);



    sprintf(hours,  "%d", thisTime->tm_hour);
    sprintf(minutes, "%d", thisTime->tm_min);
    sprintf(seconds, "%d", thisTime->tm_sec);


    char time[20];
    char colon[]=":";

    strcpy(time,hours);
    strcat(time,colon);
    strcat(time,minutes);
    strcat(time,colon);
    strcat(time,seconds);



    char string[]="SELECT assignment FROM submittedassignment where assignmentnumber = '%s' AND startDate='%s' AND startTime <= '%s' AND endTime > '%s' AND teacherNumber=(SELECT teacherNumber FROM pupils where userCode ='%s')";
    sprintf(s,string,assignmentid,date,time,time,usercodeEntered);
    if(mysql_query(conn,s))
    {
        finish_with_error(conn);
    }

    res=mysql_store_result(conn);
    if(res==NULL)
    {
        finish_with_error(conn);
    }

char assignment[30];

            row = mysql_fetch_row(res);
            if(row == NULL) {
                printf("\nAssignment not available for attempting.");
            }

           while(row){
                strcpy(assignment, row[0]);
                float score;
                float total_score = 0;
                ;
                for(int i=0;i<strlen(assignment) && deadline_status == 0;++i) //NEW deadline
                {
                   score = 0;

                   score= (attempt(assignment[i])/28) * 100;
                   total_score += score;
                   printf("\n\nCHARACTER SCORE : %.0f%%.\n\n",score);

                   int choice = 0;

                   do
                   {
                       printf("\n\nEnter 1 to proceed : ");
                       scanf("%d", &choice);
                   }while (choice != 1);

                                   //total+=k;

                    //printf("%d",k);
                }



                printf("\n\nTotal score :%.0f%%.\n\n", total_score/strlen(assignment));

                printf("Total time taken:%dsecs",total_time);


           // char query[]="INSERT INTO`attemptedassignment`(`assignmentnumber`,`userCode`,`duration`,`score`)VALUES('1','kp005','28','79%')";
            char query[]="INSERT INTO attemptedassignment(assignmentnumber, userCode, duration, score) VALUES('%s', '%s', '%d', '%.0f')";
            sprintf(q,query, assignmentid, usercodeEntered, total_time, total_score/strlen(assignment));
            if(mysql_query(conn,q))
            {
                finish_with_error(conn);
            }
              printf("\n\nYour assignment has successfully been submitted");
           }

        }
		}
		}
		}


		else if(strcmp(command,f)==0)
        {
            exit(0);
        }

        else if(strncmp(command, g, strlen(g))==0)
        {
           char *str1 = strtok(command, " ");
           char *str2 = strtok(NULL, " ");

             char query_string[] = {"SELECT assignmentnumber,startDate,startTime,endTime FROM submittedassignment WHERE assignmentnumber= '%s' AND teacherNumber=(SELECT teacherNumber FROM pupils where userCode = '%s' and password= '%s')"};
     sprintf(r, query_string, str2 ,usercodeEntered,passwordEntered);
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

                printf("Assignment Number\t\tStartDate\t\tStart time\t\tEnd time \n     %s\t\t\t\t%s\t\t%s\t        %s", row[0], row[1],row[2],row[3]);
            }
            printf("\n");
        }

        else if(strcmp(command,h)==0)
        {

            double attempts;
            double assignments;
            double percentage_done;
            char str1[30];
            char str2[30];
            char query_string[] = {"SELECT assignmentnumber,score,comment FROM attemptedassignment where  userCode = '%s' "};
		sprintf(r, query_string,usercodeEntered);
		if (mysql_query(conn, r)) {
			//fprintf(stderr, "%s\n", mysql_error(conn));
			//exit(1);
			 finish_with_error(conn);
		}

      res = mysql_store_result(conn);
      if(res==NULL){
            finish_with_error(conn);
        }

           printf("Assignment number\t Score\t Teacher's Comment");
           while((row=mysql_fetch_row(res))!= NULL){

                strcpy(str1,row[0]);
               printf("\n %s \t\t\t %s \t %s \n\n",row[0],row[1],row[2]);

        }

        char que[] = {"SELECT AVG(score),COUNT(assignmentnumber) FROM attemptedassignment  where userCode = '%s' "};
		sprintf(t, que,usercodeEntered);
		if (mysql_query(conn, t)) {
			 finish_with_error(conn);
		}

      res = mysql_store_result(conn);
      if(res==NULL){
            finish_with_error(conn);
        }

        while((row=mysql_fetch_row(res))!= NULL){


               printf("\n\nAverage Score:%s",row[0]);
               printf("\n\nNumber of assignments done:%s",row[1]);

        }


        char query[] = {"SELECT COUNT(assignmentnumber) FROM submittedassignment where  teacherNumber=(SELECT teacherNumber from pupils where userCode = '%s') "};
		sprintf(q, query,usercodeEntered);
		if (mysql_query(conn, q)) {
			 finish_with_error(conn);
		}

      res = mysql_store_result(conn);
      if(res==NULL){
            finish_with_error(conn);
        }


           while((row=mysql_fetch_row(res))!= NULL){

                strcpy(str2,row[0]);


        }

            attempts=atof(str1);
            assignments=atof(str2);

            percentage_done = (attempts/assignments)*100;

            printf("\nPercentage done:%.0f%%\n",percentage_done);





    char hours[5], minutes[5], seconds[5], year[10], month[5], day[5];
    time_t now;
    char endTime[10];
    time(&now);

    struct tm *thisTime = localtime(&now);
    sprintf(year, "%d", thisTime->tm_year + 1900);
    sprintf(month, "0%d", thisTime->tm_mon+1);
    sprintf(day, "%d", thisTime->tm_mday);

    char date[20];
    char dash[]="-";

    strcpy(date,year);
    strcat(date,dash);
    strcat(date, month);
    strcat(date, dash);
    strcat(date, day);



    sprintf(hours,  "%d", thisTime->tm_hour);
    sprintf(minutes, "%d", thisTime->tm_min);
    sprintf(seconds, "%d", thisTime->tm_sec);


    char time[20];
    char colon[]=":";

    strcpy(time,hours);
    strcat(time,minutes);
    strcat(time,seconds);

      float expired = 0;
      char string[]="SELECT startDate,endTime FROM submittedassignment where  startDate <= '%s' AND teacherNumber=(SELECT teacherNumber FROM pupils where userCode ='%s')";
    sprintf(s,string,date,usercodeEntered);
    if(mysql_query(conn,s))
    {
        finish_with_error(conn);
    }

    res=mysql_store_result(conn);

    while((row=mysql_fetch_row(res))!= NULL)
    {
                        int i, k = 0;

                        char end[10];

                for(i = 0; i < 8; i++)
                {
                    if(i == 2 || i == 5) /* ":" at indexes 2 and 5 are skipped in the new string */
                        continue;

                    else
                    end[k++] = row[1][i];
                }

                int endTime = atoi(end);

               char startDate[10];
               strcpy(startDate,row[0]);

        if(strcmp(startDate,date)==0)  {

           if(endTime>time)
            continue;
        }
        else
        {
            expired++;
        }

    }




        }



        else
        {
            printf("Invalid Command");
        }

}

		}

 else
 {
     printf("Incorrect usercode or password");
 }



        return 0;
}



void enter()
{


    printf("\n");
     printf(" _____ _____ _____ _____\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix[0],matrix[1],matrix[2],matrix[3]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix[4],matrix[5],matrix[6],matrix[7]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix[8],matrix[9],matrix[10],matrix[11]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |   %c |   %c |\n",matrix[12],matrix[13],matrix[14],matrix[15]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |   %c |\n",matrix[16],matrix[17],matrix[18],matrix[19]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |   %c |\n",matrix[20],matrix[21],matrix[22],matrix[23]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |  %c  |\n",matrix[24],matrix[25],matrix[26],matrix[27]);
   printf("|_____|_____|_____|_____|\n");


}


float attempt(ch)
{
    printf("Letter %c",ch);
    printf("\n");
   printf(" _____ _____ _____ _____\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix[0],matrix[1],matrix[2],matrix[3]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix[4],matrix[5],matrix[6],matrix[7]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix[8],matrix[9],matrix[10],matrix[11]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |   %c |   %c |\n",matrix[12],matrix[13],matrix[14],matrix[15]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |   %c |\n",matrix[16],matrix[17],matrix[18],matrix[19]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |   %c |\n",matrix[20],matrix[21],matrix[22],matrix[23]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |  %c  |\n",matrix[24],matrix[25],matrix[26],matrix[27]);
   printf("|_____|_____|_____|_____|\n");

time_t start_time,end_time;
 char str_deadline[8]; //NEW

 char query_string[] = {"SELECT endTime FROM submittedassignment where  assignmentnumber='%s'"};
		sprintf(r, query_string,assignmentid);
		if (mysql_query(conn, r)) {
			//fprintf(stderr, "%s\n", mysql_error(conn));
			//exit(1);

			 finish_with_error(conn);


		}

     res=mysql_store_result(conn);
      if(res==NULL){
            finish_with_error(conn);
        }


           while((row=mysql_fetch_row(res))){
               strcpy(str_deadline,row[0]);
           }
 char str_deadline_shortened[8];/*this will contain the end time in the format hhmmss */


                int i, k = 0;

            /*This loop removes the  ":" from the str_deadline while copying the new string into str_deadline_shortened */

                for(i = 0; i < 8; i++)
                {
                    if(i == 2 || i == 5) /* ":" at indexes 2 and 5 are skipped in the new string */
                        continue;

                    else
                    str_deadline_shortened[k++] = str_deadline[i];
                }

                int deadline = atoi(str_deadline_shortened);  /* the atoi function correctly converts str_deadline_shortened
                                                                 into an int since it's contents are all integers  */


     start_time=time(NULL);  //NEW


   for(int i=0;i<29;i++)
   {
       time_t time_now = time(NULL);  /*obtaining current seconds since the epoch*/
       char *str = ctime(&time_now);  /*converting those seconds to a string of local time ( i.e Www Mmm dd hh:mm:ss yyyy )
                                                Www: Day of week.
                                                Mmm: Month name.
                                                dd : Day of month.
                                                hh : Hour digit.
                                                mm : Minute digit.
                                                ss : Second digit.
                                                yyyy : Year digit.           */

                char local_time_string[25];      /* array to hold the above string of local time  */

                strcpy(local_time_string, str);  /* copying the string into an array for better manipulation */


                char local_time_uncoverted_short_string[25];

                int m, n = 0;

                /*converting local_time_string to an integer for better comparison with deadline time
                which is already converted to an interger  */

                for(m = 0; m < 25; m++)
                {
                    if(m == 11 || m == 12 || m == 14 || m == 15 || m ==  17 || m == 18)  /* selecting only interger parts of string */
                        local_time_uncoverted_short_string[n++] = local_time_string[m];

                    else
                      continue;
                }

                int local_time_converted_int = atoi(local_time_uncoverted_short_string); /* the atoi function then converts our string which has
                                                                                            has only intergers to one single interger */
    if(local_time_converted_int >= deadline ) /* comparing current time to deadline time */
                        {
                            printf("\n\nSORRY TIME UP, YOUR ASSIGNMENT HAS BEEN SUBMITTED!!!\n\n");
                            deadline_status = 1;  /* this new status will be checked by all the loops to ensure no more assignment attempt occurs */
                            break;
            }
   system("cls");
   printf("Time left:");
   timing(str_deadline);
   printf("\n\nLetter %c\n\n",ch);

   enter();

   printf("\n\n\nEnter 0 or 1 at position %c:",matrix[i]);
   scanf("%d",&position);




    fflush(stdin);

   if(position == 0)
   {
       matrix_entered[i]=' ';
   }

   else if(position== 1)
   {

       matrix_entered[i]='*';
   }
   else
   {
       printf("invalid");
       i--;
   }

   }


    if(ch=='A')
 {
      k=0;
    for(int i=0;i<29;++i)
  {
if(matrix_a[i]==matrix_entered[i])
{
    k++;
}
else
    {
        k+=0;
    }
  }

  }

 else if(ch=='B')
{
     k=0;
for(int i=0;i<29;++i)
{
if(matrix_b[i]==matrix_entered[i])
{
    k++;

}

else
    {
        k+=0;
    }




}





}

else if(ch=='C')
{
    k=0;


for(int i=0;i<29;++i)
{


if(matrix_c[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }

}




}

else if(ch=='D')
{
for(int i=0;i<29;++i)
{


if(matrix_d[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='E')
{

for(int i=0;i<29;++i)
{


if(matrix_e[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='F')
{

for(int i=0;i<29;++i)
{


if(matrix_f[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='G')
{

for(int i=0;i<29;++i)
{


if(matrix_g[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}


else if(ch=='H')
{

for(int i=0;i<29;++i)
{


if(matrix_h[i]==matrix_entered[i])
{

    k++;


}

else
    {
        k+=0;
    }



}




}


else if(ch=='I')
{

for(int i=0;i<29;++i)
{


if(matrix_i[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }

}



}
else if(ch=='J')
{

for(int i=0;i<29;++i)
{


if(matrix_j[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='K')
{

for(int i=0;i<29;++i)
{


if(matrix_k[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='L')
{

for(int i=0;i<29;++i)
{


if(matrix_l[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='M')
{

for(int i=0;i<29;++i)
{


if(matrix_m[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='N')
{

for(int i=0;i<29;++i)
{


if(matrix_n[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}



}

else if(ch=='O')
{

for(int i=0;i<29;++i)
{


if(matrix_o[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='P')
{

for(int i=0;i<29;++i)
{


if(matrix_p[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='q')
{

for(int i=0;i<29;++i)
{


if(matrix_q[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}
else if(ch=='R')
{

for(int i=0;i<29;++i)
{


if(matrix_r[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}
else if(ch=='S')
{

for(int i=0;i<29;++i)
{


if(matrix_s[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='T')
{

for(int i=0;i<29;++i)
{


if(matrix_t[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='U')
{

for(int i=0;i<29;++i)
{


if(matrix_u[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='V')
{
int k=0;
for(int i=0;i<29;++i)
{


if(matrix_v[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}



printf("%d",k);
}

else if(ch=='X')
{

for(int i=0;i<29;++i)
{


if(matrix_x[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='Y')
{

for(int i=0;i<29;++i)
{


if(matrix_y[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}

else if(ch=='Z')
{

for(int i=0;i<29;++i)
{


if(matrix_z[i]==matrix_entered[i])
{

    k++;

}

else
    {
        k+=0;
    }



}




}


    answer();
    end_time=time(NULL);
    difference=end_time-start_time;
    total_time+=difference;
    printf("\n\nTime taken = %ldsecs\n\n",difference);
    printf("\n\nTime left: ");
    timing("17:00:00");

    return k;
}

void answer()
{
     printf("\n\n\n\n");
     printf(" _____ _____ _____ _____\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix_entered[0],matrix_entered[1],matrix_entered[2],matrix_entered[3]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix_entered[4],matrix_entered[5],matrix_entered[6],matrix_entered[7]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |  %c  |  %c  |\n",matrix_entered[8],matrix_entered[9],matrix_entered[10],matrix_entered[11]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |  %c  |   %c |   %c |\n",matrix_entered[12],matrix_entered[13],matrix_entered[14],matrix_entered[15]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |   %c |\n",matrix_entered[16],matrix_entered[17],matrix_entered[18],matrix_entered[19]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |   %c |\n",matrix_entered[20],matrix_entered[21],matrix_entered[22],matrix_entered[23]);
   printf("|_____|_____|_____|_____|\n");
   printf("|  %c  |   %c |   %c |  %c  |\n",matrix_entered[24],matrix_entered[25],matrix_entered[26],matrix_entered[27]);
   printf("|_____|_____|_____|_____|\n");

}




void timing(char *end_time )
{



         char str_deadline[9];

                strcpy(str_deadline, end_time);

                char str_deadlline_mins[5] , str_deadlline_hrs[5], str_deadlline_secs[5];
                int  mins_now, mins_future,mins_rem, hrs_now, hrs_future,hrs_rem,secs_now,  secs_future, secs_rem;

                int a = 0, b= 0, c = 0, i = 0;

                 for(i = 0; i < 9; i++)
                {

                     if (i == 0 || i ==1)
                        str_deadlline_hrs[a++] = str_deadline[i];

                     if (i == 3 || i ==4)
                        str_deadlline_mins[b++] = str_deadline[i];

                     if (i == 6 || i ==7)
                        str_deadlline_secs[c++] = str_deadline[i];

                     else
                        continue;

                }

                hrs_future = atoi(str_deadlline_hrs);
                mins_future = atoi(str_deadlline_mins);
                secs_future = atoi(str_deadlline_secs);

                 struct tm *current_time ;
                time_t  time_now = time(NULL);
                 current_time = localtime(&time_now);

                 hrs_now = current_time->tm_hour;
                 mins_now =current_time->tm_min;
                 secs_now = current_time->tm_sec;

                if( secs_future - secs_now >= 0 )
                secs_rem = secs_future - secs_now;

                else if ( mins_future - mins_now  >=  0 )
                {
                     secs_rem = (secs_future + 60 )- secs_now;
                    --mins_future;
                }


                else
                {

                    secs_rem = (secs_future + 60 )- secs_now;
                    --hrs_future;
                    mins_future += 59;
                }



                    if( mins_future - mins_now  >=  0 )
                        mins_rem = mins_future - mins_now;
                    else
                    {
                        mins_rem = (mins_future + 60) - mins_now;
                        --hrs_future;
                    }


                        hrs_rem = hrs_future - hrs_now;


                        printf("%d hrs %d mins %d secs.\n\n", hrs_rem, mins_rem, secs_rem);




}
