import java.util.*;
import java.lang.*;

class DSA {
    public static void main(String[] args) {
        Scanner sc=new Scanner(System.in);
        int t =sc.nextInt();
        while(t-->0) {
            int n=sc.nextInt();
            int c=sc.nextInt();
            int k=sc.nextInt();
            int[] arr=new int[n];
            for(int i=0; i<n; i++){
                arr[i]=sc.nextInt();
            }
            int sum=0;
            int count=0;
            int ans=0;
            for(int j=0;j<n;j++){
                count=0;
                sum=0;
                for(int K=j;K<n;K++){
                   sum = sum+arr[K];
                   if(sum>c){
                       break;
                   }
                   count = count+1;
                   
                   if(sum>=k && sum<=c){
                       break;
                   }
                }
                if(sum<k){
                    count=0;
                }
                 ans=Math.max(count,ans);
            }
            System.out.println(ans);
        }
    }
}