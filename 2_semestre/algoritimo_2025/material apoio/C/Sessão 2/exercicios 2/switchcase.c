#include <stdio.h>
#include <time.h>

int main(){
	for (int a = 1; a <=10; a++){
		printf("\n=====TABUADA DO %d=====\n", a);
		for(int b = 1; b <=10; b++){
			printf("%d x %d = %d \n", a, b, a * b);
		}
	}


    return 0;
}
