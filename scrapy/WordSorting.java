import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.regex.Matcher;
import java.util.regex.Pattern;


public class WordSorting {

	public static void main(String[] args) throws IOException {
		//Read file
		BufferedReader br = new BufferedReader(new FileReader(
				"result_reddit.csv"));
		BufferedReader br2 = new BufferedReader(new FileReader(
				"stop-words.txt"));
		ArrayList stopWords = new ArrayList<String>();
		
		String temp = null;
		while((temp = br2.readLine()) != null){
			stopWords.add(temp);
		}
		

		//Mapping 
		HashMap<String, Integer> map = new HashMap<String, Integer>();

		String thisLine = null;

		//Put all the word in a map with count
		while((thisLine = br.readLine()) != null){
			String[] tokens = thisLine.split(" ");
			for(int i=0;i<tokens.length;i++){
				tokens[i] = removeSpecialChar(tokens[i]);
				//out.write(""+tokens[i].toLowerCase()+" "+tokens[i+1].toLowerCase()+" "+tokens[i+2].toLowerCase()+"\n");
				if(!isStopWords(tokens[i],stopWords)){
					if(map.get(tokens[i]) != null){
						map.put(tokens[i],map.get(tokens[i])+1);
					}
					else{
						map.put(tokens[i],1);
					}
				}
			}
		}

		//Create word objects from the map
		ArrayList<String> list = new ArrayList<String>(map.keySet());
		ArrayList<Word> word_list = new ArrayList<Word>();
		for(int i=0;i<list.size();i++){
			word_list.add(new Word(list.get(i),map.get(list.get(i))));
		}

		//Create comparator
		Word comparator = new Word();

		//Sort the words
		Collections.sort(word_list,comparator);

		//Write to the file
		File f  = new File("result_reddit.sql");
		PrintWriter out = new PrintWriter(f);
		
		for(int i=0;i<word_list.size();i++){
			System.out.println("INSERT INTO `illinipost_DB`.`Words` (`word`, `num`) VALUES ('"+word_list.get(i).word+"', '"+word_list.get(i).num+"');\n");
			out.write("INSERT INTO `illinipost_DB`.`Words` (`word`, `num`) VALUES ('"+word_list.get(i).word+"', '"+word_list.get(i).num+"');\n");
		}
		out.close();

	}
	
	/**
	 * Function to remove special characters: only keep from a-z, 0-9, A-Z
	 * @param s
	 * @return
	 */
	public static String removeSpecialChar(String s){
		Pattern pt = Pattern.compile("[^a-zA-Z0-9\\s]");
		Matcher match= pt.matcher(s);
		while(match.find())
		{
			String temp= match.group();
			s=s.replaceAll("\\"+temp, "");
		}
		return s;
	}
	
	public static boolean isStopWords(String s, ArrayList<String> wordList){
		for(int i=0;i<wordList.size();i++){
			if(wordList.get(i).equalsIgnoreCase(s)){
				return true;
			}
		}
		return false;
	}

	private static class Word implements Comparator<Word>{
		String word;
		int num;

		public Word(String word,int num){
			this.word = word;
			this.num = num;
		}

		public Word() {
		}

		@Override
		public int compare(Word o1, Word o2) {

			//ascending order
			return o2.num - o1.num;

			//descending order
			//			return o2.num - o1.num;
		}


	}
	
	
}
