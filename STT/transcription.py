import os
from dotenv import load_dotenv
from io import BytesIO
import requests
from elevenlabs.client import ElevenLabs
import json

AUDIO_PATH = "https://storage.googleapis.com/eleven-public-cdn/audio/marketing/nicole.mp3"

def transcribe(client: ElevenLabs, audio_data: BytesIO):

    transcription = client.speech_to_text.convert(
    # enable_logging=False, # elevenLabsに記録を残さない.
    model_id="scribe_v1",
    # model_id="scribe_v1_experimental", 混合言語なら.
    file=audio_data,
    language_code="eng", # 混在の場合には指定せず自動検出.
    tag_audio_events=True, # 笑い声や拍手にタグ付け.
    # num_speakers=2, # 話者の最大数.(話者分離性能向上) 最大32人まで. 
    timestamps_granularity="none", # none, character, word
    diarize=False, # 話者分離
    file_format="other" # pcm_s16le_16(wav) 推奨.
    )

    return transcription

def main():

    load_dotenv()
    client = ElevenLabs(
    api_key=os.getenv("ELEVENLABS_API_KEY"),
    )

    audio_url = AUDIO_PATH
    response = requests.get(audio_url)
    audio_data = BytesIO(response.content)

    # APIリクエスト
    transcription = transcribe(client, audio_data)

    with open("STT/out_transcript.json", "w", encoding="utf-8") as f:
        json.dump(transcription.model_dump(), f, ensure_ascii=False, indent=2)

if __name__ == "__main__":
    main()
