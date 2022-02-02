#include<stdio.h>
#include<stdlib.h>
void enter();
void answer();
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
//char matrix_v[28]={'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',''};
char matrix_w[28]={'*',' ',' ','*','*',' ',' ','*','*','*','*','*','*',' ',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_x[28]={'*',' ',' ','*',' ','*','*',' ',' ','*','*',' ','*',' ',' ','*',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' '};
char matrix_y[28]={'*',' ',' ','*',' ','*',' ','*',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ','*',' ',' ',' ',' ',' '};
char matrix_z[28]={'*','*','*','*',' ',' ','*',' ',' ','*',' ',' ','*',' ',' ',' ','*','*','*','*',' ',' ',' ',' ',' ',' ',' ',' '};


char matrix_entered[29];
char ch;

int main()
{
   int k=0;
   char position;

  //printf("Enter number of characters:");
  //scanf("%d",&ch);


  printf("Enter the letter:");
  scanf("%c",&ch);


   for(int i=0;i<29;++i)
   {

   enter();

   printf("Enter 0 or 1 at position %c:",matrix[i]);
   scanf("%c",&position);

   if(position == '0')
   {

       matrix_entered[i]=' ';
   }

   else if(position=='1')
   {

       matrix_entered[i]='*';
   }
   else
   {
       printf("invalid");
       --i;
   }

   }

  if(ch=='A')
 {
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
   printf("%d",k);
  }

 else if(ch=='B')
{
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



printf("%d",k);
}

else if(ch=='C')
{

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



printf("%d",k);

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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
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



printf("%d",k);
}

/*else if(ch=='V')
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
*/
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



printf("%d",k);
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



printf("%d",k);
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



  printf("%d",k);
}
answer();
return 0;
}

void enter()
{
   system("cls");

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
