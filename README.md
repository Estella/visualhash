# visualhash
SHA512 Visual Hashes better human experience

![Before & After](/visualhash.png)

This project was created due to a friend I have in human behavior science, which led into some discussion about human vs machine logic.
Normally hashing produces a human readable hex output: eb222c4b3c4a52ccb04fbe51740dc2259f72a3cadfe6a8e135a28891a8d311ede56f51e4a61756af37f88d5d6867fa9d868cce91b2152166bcf6ee52b3ed96a8
Which is a lot to read for 512bits so instead I propose a way to visualize it in such a way it's far faster for a human visual approach vs reading a hex string since we often just read the first few at the start and or the last few at the end. With a visual hash can quickly identify the match or non-match.

![Before & After](/string_test.png)

## string_test.php - Convert a string into a SHA512 Visual Hash

```
$vhash = new visual_hash();
$vhash->gen_hash_str('Estella Mystagic',32,4); // Sring, bar height, bar width
```

![Before & After](/file_test.png)
## file_test.php - Read a file from disk and display as a SHA512 Visual Hash
```
>sha512sum Snapchat_01.mp4 
eb222c4b3c4a52ccb04fbe51740dc2259f72a3cadfe6a8e135a28891a8d311ede56f51e4a61756af37f88d5d6867fa9d868cce91b2152166bcf6ee52b3ed96a8  Snapchat_01.mp4
```

```
$file_input = dirname(__FILE__).'/Snapchat_01.mp4';
$vhash = new visual_hash();
$vhash->gen_hash_file($file_input,32,4); // file/filepath, bar height, bar width
```
